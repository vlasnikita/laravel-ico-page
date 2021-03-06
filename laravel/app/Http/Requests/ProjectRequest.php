<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lang_orig' => 'required',
            'lang_transl' => 'required',
            'title_orig' => 'required|min:2|max:255',
            'title_transl' => 'required|min:2|max:255',
//            'image' => 'required|min:2|max:255',
            'video' => 'required|min:2|max:255',
            'description' => 'required',
            'user_id' => 'required',

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}