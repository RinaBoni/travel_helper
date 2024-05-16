<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',//проверка существует ли такая категория в таблице категорий, должно быть рабно id
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'website' => 'nullable|string',
            'youtube' => 'nullable|string',
            'vk' => 'nullable|string',
            'telegram' => 'nullable|string',
            'odnoklassniki' => 'nullable|string',
            'country' => 'required|string',
            'region' => 'required|string',
            'district' => 'required |string',
            'city' => 'nullable|string',
            'street' => 'nullable|string',
            'building' => 'nullable|string',
            'coordinates' => 'nullable|string',
            'map' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'content.required' => 'Это поле необходимо заполнить',
            'title.string' => 'Данные должны быть в виде строки',
            'content.string' => 'Данные должны быть в виде строки',
            'preview_image.required' => 'Необходимо выбрать файл',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо заполнить',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
            'website.string' => 'Данные должны быть в виде строки',
            'youtube.string' => 'Данные должны быть в виде строки',
            'vk.string' => 'Данные должны быть в виде строки',
            'telegram.string' => 'Данные должны быть в виде строки',
            'odnoklassniki.string' => 'Данные должны быть в виде строки',
            'country.string' => 'Данные должны быть в виде строки',
            'country.required' => 'Это поле необходимо заполнить',
            'region.string' => 'Данные должны быть в виде строки',
            'region.required' => 'Это поле необходимо заполнить',
            'district.string' => 'Данные должны быть в виде строки',
            'district.required' => 'Это поле необходимо заполнить',
            'city.string' => 'Данные должны быть в виде строки',
            'street.string' => 'Данные должны быть в виде строки',
            'building.string' => 'Данные должны быть в виде строки',
            'coordinates.string' => 'Данные должны быть в виде строки',
            'map.string' => 'Данные должны быть в виде строки',
            'map.required' => 'Это поле необходимо заполнить',
        ];
    }
}
