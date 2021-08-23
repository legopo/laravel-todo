<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class EditUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users',
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
            // 'name' => ''
        ];
    }

    /**
     * バリデーション前調整
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // メールが現在のものと変わらなければ更新しない
        if (isset($this['email'])) {
            $user = User::select(['id', 'email'])->find($this->id);

            if($user->email === $this['email']) {
                unset($this['email']);
            }
        }

        // idは一応unsetする
        unset($this['id']);

        return $this->all();
    }

}
