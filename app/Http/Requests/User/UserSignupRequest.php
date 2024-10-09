<?php

namespace App\Http\Requests\User;

use App\GeneralTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class UserSignupRequest extends FormRequest
{
    use GeneralTrait ;
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
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required' , 'confirmed', 'min:8'],
            'name' => ['required'],
            'invitation_code' => ['required'/*'exists:companies,invitation_code'*/]
        ];
    }
    /*protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->sendError($validator->errors()));
    }*/
}
