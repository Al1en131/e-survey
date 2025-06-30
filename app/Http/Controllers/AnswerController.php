<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Likert;
use App\Models\Option;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Step;
use App\Models\Survey;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $surveys = Survey::with(['participant' => fn($q) => $q->where('is_finish', 1)])
            ->get()
            ->map(function ($survey) {
                $stepCount = Step::where('survey_id', $survey->id)
                    ->where('stepable_type', \App\Models\Question::class)
                    ->count();

                // Tambahkan properti ke dalam objek survey
                $survey->count_question = $stepCount;

                return $survey;
            });

        return view('pages.admin.answer.index', compact('surveys'));
    }



    public function participant(Survey $survey, Participant $participant)
    {
        $steps = Step::where('survey_id', $survey->id)->where('stepable_type', Question::class)->orderBy('order')->get();
        $answers = Answer::where('participant_id', $participant->id)->get();

        return view('pages.admin.answer.answer', [
            'survey' => $survey,
            'participant' => $participant,
            'steps' => $steps,
            'answers' => $answers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }

    public function detail(Survey $survey)
    {
        $participants = Participant::where('survey_id', $survey->id)
            ->where('is_finish', 1)
            ->get();

        $questionSteps = Step::with('stepable')
            ->where('survey_id', $survey->id)
            ->where('stepable_type', \App\Models\Question::class)
            ->orderBy('order')
            ->get();

        $chartData = [];
        foreach ($questionSteps as $step) {
            $question = $step->stepable;

            $answers = Answer::with('answerable')
                ->where('question_id', $question->id)
                ->whereIn('participant_id', $participants->pluck('id'))
                ->get();

            if ($question->type === 'essay') {
                $essayAnswers = $answers->map(fn($a) => $a->answerable->essay ?? null)->filter();

                $chartData[] = [
                    'question' => $question->question,
                    'type' => 'essay',
                    'data' => $essayAnswers->values(),
                ];
            } elseif ($question->type === 'likert') {
                // Ambil angka skala dari options (misal: ['1','2','3','4','5'])
                $availableLikerts = Option::where('question_id', $question->id)
                    ->orderBy('option') // biar urut
                    ->pluck('option')   // isinya: ['1','2','3','4','5']
                    ->toArray();

                // Buat map jumlah jawaban tiap skala
                $grouped = collect($availableLikerts)->mapWithKeys(function ($label) use ($answers) {
                    return [
                        $label => $answers->filter(fn($a) => (string) $a->answerable->likert === $label)->count()
                    ];
                });

                $chartData[] = [
                    'question' => $question->question,
                    'type' => 'likert',
                    'data' => $grouped,
                    'labels' => $availableLikerts // ← untuk digunakan di JS nanti
                ];
            } else {
                $grouped = $answers->groupBy(fn($a) => $a->answerable->option ?? 'Tidak dijawab')
                    ->map(fn($group) => $group->count());

                $chartData[] = [
                    'question' => $question->question,
                    'type' => 'choices',
                    'data' => $grouped,
                ];
            }
        }

        return view('pages.admin.answer.detail', compact('survey', 'participants', 'chartData'));
    }

    public function chart(Survey $survey)
    {
        $participants = Participant::where('survey_id', $survey->id)
            ->where('is_finish', 1)
            ->get();

        $questionSteps = Step::with('stepable')
            ->where('survey_id', $survey->id)
            ->where('stepable_type', \App\Models\Question::class)
            ->orderBy('order')
            ->get();

        $chartData = [];
        foreach ($questionSteps as $step) {
            $question = $step->stepable;

            $answers = Answer::with('answerable')
                ->where('question_id', $question->id)
                ->whereIn('participant_id', $participants->pluck('id'))
                ->get();

            if ($question->type === 'essay') {
                $essayAnswers = $answers->map(fn($a) => $a->answerable->essay ?? null)->filter();

                $chartData[] = [
                    'question' => $question->question,
                    'type' => 'essay',
                    'data' => $essayAnswers->values(),
                ];
            } elseif ($question->type === 'likert') {
                // Ambil angka skala dari options (misal: ['1','2','3','4','5'])
                $availableLikerts = Option::where('question_id', $question->id)
                    ->orderBy('option') // biar urut
                    ->pluck('option')   // isinya: ['1','2','3','4','5']
                    ->toArray();

                // Buat map jumlah jawaban tiap skala
                $grouped = collect($availableLikerts)->mapWithKeys(function ($label) use ($answers) {
                    return [
                        $label => $answers->filter(fn($a) => (string) $a->answerable->likert === $label)->count()
                    ];
                });

                $chartData[] = [
                    'question' => $question->question,
                    'type' => 'likert',
                    'data' => $grouped,
                    'labels' => $availableLikerts // ← untuk digunakan di JS nanti
                ];
            } else {
                $grouped = $answers->groupBy(fn($a) => $a->answerable->option ?? 'Tidak dijawab')
                    ->map(fn($group) => $group->count());

                $chartData[] = [
                    'question' => $question->question,
                    'type' => 'choices',
                    'data' => $grouped,
                ];
            }
        }

        return view('pages.admin.answer.chart', compact('survey', 'participants', 'chartData'));
    }
}
