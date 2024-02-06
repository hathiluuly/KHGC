<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'content' => 'required',
            'description' => 'nullable|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publish_date' => 'nullable|date',
            'status' => 'nullable|in:0,1,2',
        ];
    }
}
