<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required',
            'description'   => 'required|min:10',
            'image'         => 'image|mimes:jpeg,jpg,png',
            'category_id'   => 'required|exists:categories,id',
            'tag_id'            => 'required|exists:tags,id',
            'author_id'         => 'required|exists:authors,id',
        ];
    }
}
