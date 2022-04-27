<?php

declare(strict_types = 1);

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

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
        'title'   => "string",
        'content' => "string"
    ])] public function rules(): array
    {
        return [
            'title'   => 'required|string',
            'content' => 'required|string',
        ];
    }
}
