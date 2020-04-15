<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
         // verify the data sent in the form
         return [
            'post_title' => 'bail|required|between:6,100',
            'post_category' => 'bail|required|between:1,40|alpha',
            'post_content' => 'bail|required|max:650'
        ];
    }


    // cutom error messages for the contactForm
    public function messages()
    {
        return [
            'post_title.required' => 'Ce champs est obligatoire',
            'post_category.required' => 'Ce champs est obligatoire',
            'post_content.required' => 'Ce champs est obligatoire',
        ];
    }
}
