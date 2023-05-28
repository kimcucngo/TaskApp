<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'oldpassword' => 'required|min:6|max:255',
            'newpassword' => ['required',new PasswordRule(),'min:6','max:255'],
            'confirmpassword' => ['required',new PasswordRule(),'min:6','max:64','same:newpassword'],
        ];
    }
}
