<?php

declare(strict_types = 1);

namespace App\Http\Requests\Admin\Post;

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
        'title'         => "string",
        'content'       => "string",
        'preview_image' => "string",
        'main_image'    => "string",
        'category_id'   => "string"
    ])] public function rules(): array
    {
        return [
            'title'         => 'required|string',
            'content'       => 'required|string',
            'preview_image' => 'required|file',
            'main_image'    => 'required|file',
            'category_id'   => 'required|exists:categories,id',
        ];
    }
}
