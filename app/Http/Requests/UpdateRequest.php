<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,' . $this->route('id'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name,string'=> 'Name must be a string',
            'name.max'=> 'Name must nit exceed 255 characters',
            'email.required'=> 'Email is required',
            'email.email'=> 'Email must be a valid email address',
            'email.unique'=> 'Email must be unique',
        ];
    }
}
