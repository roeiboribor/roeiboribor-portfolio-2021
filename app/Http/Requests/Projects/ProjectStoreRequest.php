<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', 'distinct', 'unique:projects'],
            'slug' => ['required', 'string', 'max:255'],
            'tags' => ['required'],
            'link' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'],
        ];
    }
}
