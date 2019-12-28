<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $articleId = $this->route()->id;

        $rules = [
            'name' => 'required|unique:articles,name,' . $articleId,
            'body' => 'required|min:10',
        ];

        return $rules;
    }
}
