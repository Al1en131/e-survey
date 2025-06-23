<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Step;
use App\Models\Survey;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = Survey::with(['participant' => fn ($q) => $q->where('is_finish', 1)])->get();
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
        $participants = Participant::where('survey_id', $survey->id)->where('is_finish', 1)->get();
        return view('pages.admin.answer.detail', compact('participants', 'survey'));
    }
}
