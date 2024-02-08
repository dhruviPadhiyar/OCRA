<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEbookRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg',
            'ebook' => 'required|mimes:pdf,epub|max:100000',

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'cover.required' => 'The cover field is required.',
            'cover.mimes' => 'The cover must be a valid image file (png, jpg, jpeg).',
            'ebook.required' => 'The ebook field is required.',
            'ebook.mimes' => 'The ebook must be a valid file type (pdf, epub).',
            'ebook.max' => 'The ebook may not be greater than 100 MB.',
        ];
    }
}
