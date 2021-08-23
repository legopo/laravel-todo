<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Rules\CurrentPassword;
use App\Models\User;

class EditPasswordRequest extends FormRequest
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
            'password_current' => ['required', new CurrentPassword($this->id)],
            'password' => ['confirmed', Rules\Password::defaults()],
        ];
    }

    /**
     *
     *
     * @return array
     */
    public function messages(){
        return [
            //
        ];
    }

    /**
     *
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'password_current' => '現在のパスワード'
        ];
    }

}
