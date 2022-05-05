<?php

declare(strict_types = 1);

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreRequest extends FormRequest
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
        'title' => "string"
    ])]
    public function rules(): array
    {
        return [
            'title' => 'required|string',
        ];
    }

    #[ArrayShape([
        'title.required' => "string",
        'title.string'   => "string"
    ])]
    public function messages(): array
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения.',
            'title.string'   => 'Данные должны соответствовать строчному типу.',
        ];
    }
}
