<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Essay;
use App\Models\Likert;
use App\Models\Management;
use App\Models\Option;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Step;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($slug)
    {
        $survey = Survey::where('slug', $slug)->first();
        $management = Management::all();

        if (!$survey) {
            abort(404);
        }

        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        if ($dateNow < $survey->start_date) {
            // dd("Survey not started yet");
            return view('pages.user.survey.close', compact('survey', 'dateNow','management'));
        }

        if ($dateNow >= $survey->end_date) {
            // dd("Survey has finisihed");
            return view('pages.user.survey.close', compact('survey', 'dateNow','management'));
        }

        $step = Step::where('survey_id', $survey->id)->where('stepable_type', Question::class)->orderBy('order')->get();
        $count_question = $step->count();

        return view('pages.user.index', compact('survey', 'count_question', 'management'));
    }

    public function question($slug)
    {
        $survey = Survey::where('slug', $slug)->first();
        $management = Management::all();

        if (!$survey) {
            abort(404);
        }
        $participants = Participant::where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->first();
        if (!$participants) {
            Participant::create([
                'survey_id' => $survey->id,
                'user_id' => auth()->user()->id,
                'is_finish' => 0,
            ]);
        } elseif ($participants->is_finish) {
            abort(403);
        }

        $steps = Step::where('survey_id', $survey->id)->get();

        $likerts = Likert::all();

        return view('pages.user.survey.index', compact('steps', 'survey', 'likerts', 'management'));
    }

    public function storeanswers(Request $request, $slug)
    {
        $survey = Survey::where('slug', $slug)->first();

        $participants = Participant::where('survey_id', $survey->id)->where('user_id', auth()->user()->id)->first();

        if ($participants) {
            $participants->update([
                'is_finish' => 1,
            ]);
        }

        $answers = json_decode($request->input('answerSurvey'), true);

        try {
            DB::beginTransaction();
            foreach ($answers as $answer) {
                $questionId = $answer['questionId'] ?? null;
                switch ($answer['type']) {
                    case 'likert':
                        Answer::create([
                            'participant_id' => $participants->id,
                            'question_id' => $questionId,
                            'answerable_type' => Likert::class,
                            'answerable_id' => $answer['value']
                        ]);
                        break;

                    case 'choices':
                        Answer::create([
                            'participant_id' => $participants->id,
                            'question_id' => $questionId,
                            'answerable_type' => Option::class,
                            'answerable_id' => $answer['value']
                        ]);
                        break;

                    case 'essay':
                        $essay = Essay::create([
                            'essay' => $answer['value'],
                        ]);
                        Answer::create([
                            'participant_id' => $participants->id,
                            'question_id' => $questionId,
                            'answerable_type' => Essay::class,
                            'answerable_id' => $essay->id,
                        ]);
                        break;
                    default:
                        break;
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['message' => 'Answers saved successfully']);
    }

    public function endAnswer()
    {
        $management = Management::all();
        return view('pages.user.endsurvey', ['management' => $management]);
    }

    public function startSurvey($slug)
    {
        $management = Management::all();
        $survey = Survey::where('slug', $slug)->first();

        if (!$survey) {
            abort(404);
        }

        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        if ($dateNow < $survey->start_date) {
            dd("Survey not started yet");
        }

        if ($dateNow >= $survey->end_date) {
            dd("Survey has finisihed");
        }

        $step = Step::where('survey_id', $survey->id)->where('stepable_type', Question::class)->orderBy('order')->get();
        $count_question = $step->count();
        $question_id = $step->first();

        $participants = Participant::where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->first();

        return view('pages.user.startsurvey', compact('survey', 'step', 'question_id', 'count_question', 'participants', 'management'));
    }
}
