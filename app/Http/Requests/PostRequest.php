<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'text' => 'required|min:10',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'title incorrect',
            'title.min' => 'title min incorrect',
            'title.max' => 'title max incorrect',
            'text.required' => 'text incorrect',
            'text.min' => 'text min incorrect',
        ];
    }
}
