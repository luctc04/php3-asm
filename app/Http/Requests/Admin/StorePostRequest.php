<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'img_thumbnail' => 'required',
            'excerpt' => 'required',
            // 'tags' => 'required',
            'content' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'Vui lòng nhập title',
    //         'img_thumbnail.required' => 'Vui lòng nhập ảnh',
    //     ];
    // }
}
