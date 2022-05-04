<?php

declare(strict_types = 1);

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $user_id
 */
class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
        'name'    => "string",
        'email'   => "string",
        'user_id' => "string",
        'role'    => "string"
    ])] public function rules(): array
    {
        return [
            'name'    => 'required|string',
            'email'   => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role'    => 'required|integer',
        ];
    }

    #[ArrayShape([
        'name.required'  => "string",
        'name.string'    => "string",
        'email.required' => "string",
        'email.string'   => "string",
        'email.email'    => "string",
        'email.unique'   => "string",
    ])] public function messages(): array
    {
        return [
            'name.required'  => 'Это поле необходимо для заполнения.',
            'name.string'    => 'Имя должно быть строкой.',
            'email.required' => 'Это поле необходимо для заполнения.',
            'email.string'   => 'Почта должно быть строкой.',
            'email.email'    => 'Ваша почта должна соответствовать формату mail@some.domain.',
            'email.unique'   => 'Пользователь с таким email уже существует.',
        ];
    }
}
