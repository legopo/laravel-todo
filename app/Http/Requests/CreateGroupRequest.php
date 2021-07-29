<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'name' => 'required|max:255',
        ];
    }

    /**
     *
     *
     * @return array
     */
    public function messages(){
        return [
            // 'birth_date.date_format' => ':attributeは必ず選択してください。',
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
        // ユーザーidを追加する
        $this->merge(['user_id' => \Auth::id()]);
    }
}
