<?php

namespace App\Http\Requests\Person\Personal;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
            'lastname' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'car' => 'nullable|boolean',
            'newsletter' => 'nullable|boolean',
            'user_image' => 'nullable|file',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'email.required' => 'Это поле необходимо заполнить',
            'name.string' => 'Имя должно быть строкой',
            'email.string' => 'Почта должно быть строкой',
            'email.email' => 'Ваша почта должна сообветствовать формату name@mail.ru',
            'email.unique' => 'Пользователь с такой почтой уже существует',
        ];
    }
}
