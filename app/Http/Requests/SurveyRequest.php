<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string',
            'start_date' => 'required|string',
            'start_time' => 'required|string',
            'end_date' => 'required|string',
            'end_time' => 'required|string',
        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store(): array
    {
        return [
            'title' => 'required|unique:surveys,title|min:3|max:150',
        ];
    }

    public function update(): array
    {
        $survey = $this->route('survey');

        return [
            'title' => "required|unique:surveys,title,{$survey->id}|min:3|max:150",
        ];
    }
}
