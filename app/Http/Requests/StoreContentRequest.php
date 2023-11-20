<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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

        $max_size = (int) ini_get('upload_max_filesize') * 1000;
        return [
            'text' => ['nullable', 'string'],
            'image_path' => ['nullable', 'image', 'file', 'max:' . $max_size],
        ];
    }
}
