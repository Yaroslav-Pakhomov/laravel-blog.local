<?php

declare(strict_types = 1);

namespace App\Http\Requests\Post\Comment;

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
        'message' => "string"
    ])] public function rules(): array
    {
        return [
            'message' => 'required|string',
        ];
    }
}
