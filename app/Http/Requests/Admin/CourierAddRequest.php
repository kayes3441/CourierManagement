<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CourierAddRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'role' => 'required',
            'user_type' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.unique' => 'Email already taken',
            'role.required' => 'Role is required',
            'user_type.required' => 'User Type is required',
            'password.required' => 'password is required',
            'password.min' => 'minimum password is 8 characters',
        ];
    }
}
