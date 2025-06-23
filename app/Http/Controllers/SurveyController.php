<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SurveyRequest;
use App\Models\Checkpoint;
use App\Models\Option;
use App\Models\Question;
use App\Models\Step;
use App\Models\Survey;
use Carbon\Carbon;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = Survey::with('participant')->get();

        return view('pages.admin.survey.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.survey.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SurveyRequest $request)
    {
        $surveyValidate = validator::make($request->all(), $request->rules());

        if (!$surveyValidate->fails()) {
            try {
                DB::beginTransaction();

                $start = $request->start_date . " " . $request->start_time . ':00';
                $end = $request->end_date . " " . $request->end_time . ':00';

                $survey = Survey::create([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'description' => $request->description,
                    'start_date' => $start,
                    'end_date' => $end,
                ]);

                $step = 1;
                foreach ($request->questions as $questionRequest) {
                    if ($questionRequest['type'] === 'checkpoint') {
                        $checkpoint = Checkpoint::create([
                            'title' => $questionRequest['checkpoint'],
                            'slug' => Str::slug($questionRequest['checkpoint']),
                            'description' => $questionRequest['checkpointDescription'],
                        ]);

                        $checkpoint->steps()->create([
                            'survey_id' => $survey->id,
                            'order' => $step,
                        ]);

                        if (array_key_exists('media', $questionRequest)) {
                            $checkpoint->addMedia($questionRequest['media'])
                                ->usingFileName(Str::random(8) . "." . $questionRequest['media']->extension())
                                ->toMediaCollection('checkpoint');
                        }
                    } else {
                        $question = Question::create([
                            'question' => $questionRequest['question'],
                            'type' => $questionRequest['type'],
                        ]);

                        $question->steps()->create([
                            'survey_id' => $survey->id,
                            'order' => $step,
                        ]);

                        if ($questionRequest['type'] === 'choices') {
                            foreach ($questionRequest['options'] as $option) {
                                Option::create([
                                    'question_id' => $question->id,
                                    'option' => $option,
                                ]);
                            }
                        } elseif ($questionRequest['type'] === 'likert') {
                            Option::create([
                                'question_id' => $question->id,
                                'option' => $questionRequest['likert'],
                            ]);
                        }

                        if (array_key_exists('media', $questionRequest)) {
                            $question->addMedia($questionRequest['media'])
                                ->usingFileName(Str::random(8) . "." . $questionRequest['media']->extension())
                                ->toMediaCollection('question');
                        }
                    }
                    $step++;
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();

                if (app()->environment('local')) {
                    throw $th;
                }

                session()->flash('error', 'An error has occurred');
                return redirect()->route('admin.survey.create');
            }

            session()->flash('success', 'Successfully added a new survey');

            return redirect()->route('admin.survey.index');
        }
        session()->flash('error', 'Failed to validate input! please try again');

        return redirect()->route('admin.survey.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $survey = Survey::where('id', $id)->first();
        $steps = Step::where('survey_id', $survey->id)->get();

        $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $survey->start_date);
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $survey->end_date);

        return view('pages.admin.survey.edit', compact('survey', 'steps', 'startDate', 'endDate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SurveyRequest $request, Survey $survey)
    {
        $surveyValidate = validator::make($request->all(), $request->rules());

        if (!$surveyValidate->fails()) {
            try {
                DB::beginTransaction();

                $start = $request->start_date . " " . $request->start_time;
                $end = $request->end_date . " " . $request->end_time;

                $survey->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'description' => $request->description,
                    'start_date' => $start,
                    'end_date' => $end,
                ]);

                $step = 1;
                foreach ($request->questionsUpdate as $questionUpdate) {
                    if ($questionUpdate['type'] === 'checkpoint') {
                        $checkpoint = Checkpoint::find($questionUpdate['id']);
                        $checkpoint->update([
                            'title' => $questionUpdate['checkpoint'],
                            'slug' => Str::slug($questionUpdate['checkpoint']),
                            'description' => $questionUpdate['checkpointDescription'],
                        ]);

                        $checkpoint->steps()->update([
                            'survey_id' => $survey->id,
                            'order' => $step,
                        ]);

                        if (array_key_exists('media', $questionUpdate)) {
                            $checkpoint->media()->delete();
                            $checkpoint->addMedia($questionUpdate['media'])
                                ->usingFileName(Str::random(8) . "." . $questionUpdate['media']->extension())
                                ->toMediaCollection('checkpoint');
                        }
                    } else {
                        $question = Question::find($questionUpdate['id']);
                        $question->update([
                            'question' => $questionUpdate['question'],
                            'type' => $questionUpdate['type'],
                        ]);

                        $question->steps()->update([
                            'survey_id' => $survey->id,
                            'order' => $step,
                        ]);

                        if ($questionUpdate['type'] === 'choices') {
                            $resetOption = true;
                            foreach ($questionUpdate['options'] as $option) {
                                if (is_array($option)) {
                                    $choiceOption = Option::find($option['choiceId']);
                                    $choiceOption->update([
                                        'question_id' => $question->id,
                                        'option' => $option['choice'],
                                    ]);
                                } else {
                                    if ($resetOption) {
                                        $question->option()->delete();
                                        $resetOption = false;
                                    }
                                    Option::create([
                                        'question_id' => $question->id,
                                        'option' => $option,
                                    ]);
                                }
                            }
                        } elseif ($questionUpdate['type'] === 'likert') {
                            $likertOption = Option::find($questionUpdate['likertId']);
                            $likertOption->update([
                                'question_id' => $question->id,
                                'option' => $questionUpdate['likert'],
                            ]);
                        }

                        if (array_key_exists('media', $questionUpdate)) {
                            $question->media()->delete();
                            $question->addMedia($questionUpdate['media'])
                                ->usingFileName(Str::random(8) . "." . $questionUpdate['media']->extension())
                                ->toMediaCollection('question');
                        }
                    }
                    $step++;
                }

                if ($request->questions) {
                    foreach ($request->questions as $questionNew) {
                        if ($questionNew['type'] === 'checkpoint') {
                            $checkpoint = Checkpoint::create([
                                'title' => $questionNew['checkpoint'],
                                'slug' => Str::slug($questionNew['checkpoint']),
                                'description' => $questionNew['checkpointDescription'],
                            ]);

                            $checkpoint->steps()->create([
                                'survey_id' => $survey->id,
                                'order' => $step,
                            ]);

                            if (array_key_exists('media', $questionNew)) {
                                $checkpoint->addMedia($questionNew['media'])
                                    ->usingFileName(Str::random(8) . "." . $questionNew['media']->extension())
                                    ->toMediaCollection('question');
                            }
                        } else {
                            $question = Question::create([
                                'question' => $questionNew['question'],
                                'type' => $questionNew['type'],
                            ]);

                            $question->steps()->create([
                                'survey_id' => $survey->id,
                                'order' => $step,
                            ]);

                            if ($questionNew['type'] === 'choices') {
                                foreach ($questionNew['options'] as $option) {
                                    Option::create([
                                        'question_id' => $question->id,
                                        'option' => $option,
                                    ]);
                                }
                            } elseif ($questionNew['type'] === 'likert') {
                                Option::create([
                                    'question_id' => $question->id,
                                    'option' => $questionNew['likert'],
                                ]);
                            }

                            if (array_key_exists('media', $questionNew)) {
                                $question->addMedia($questionNew['media'])
                                    ->usingFileName(Str::random(8) . "." . $questionNew['media']->extension())
                                    ->toMediaCollection('question');
                            }
                        }
                        $step++;
                    }
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();

                if (app()->environment('local')) {
                    throw $th;
                }

                session()->flash('error', 'An error has occurred');
                return redirect()->route('admin.survey.edit');
            }

            session()->flash('success', 'Successfully updated survey');

            return redirect()->route('admin.survey.index');
        }
        session()->flash('error', 'Failed to validate input! please try again');

        return redirect()->route('admin.survey.edit', ['id' => $survey->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return redirect()->back();
    }

    function updatepublish(Request $request, Survey $survey)
    {
        $survey->update(['is_publish' => !$survey->is_publish]);
        return redirect()->back();
    }
}
