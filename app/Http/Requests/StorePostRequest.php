<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = User::find($this->route('user_id'));
 
        // return $user && $this->user()->can('create', $user);
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
            'title'=>['required','min:3','unique:posts,' . $this->id],
            \Illuminate\Validation\Rule::unique('posts')->ignore($this->id),
            'description'=>['required','min:10']
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Enter Title',
            'title.min' => 'Enter at least 3 character at title',
            'description.required' => 'Enter Description',
            'description.min' => 'Enter at least 10 character at description'
        ];
    }
}
