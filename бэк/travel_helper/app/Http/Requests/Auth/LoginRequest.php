<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 *
 * @property-read string $email
 * @property-read string $password
 * @property-read bool $remember
 */
class LoginRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean'
        ];
    }
}
