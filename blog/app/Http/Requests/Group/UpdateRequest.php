<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date',
            'post_id' => 'required|integer|exists:posts,id',
            'additional_information' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'departure_date.required' => 'Это поле необходимо заполнить',
            'arrival_date.required' => 'Это поле необходимо заполнить',
            'post_id.required' => 'Это поле необходимо заполнить',
            'additional_information.required' => 'Это поле необходимо заполнить',
        ];
    }
}
