<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTaskRequest extends FormRequest
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
            'name' => 'required|max:255',
            'date' => 'nullable|date_format:Y-m-d', // prepareForValidation()でdue_dateに変換してdb保存
            'detail' => 'nullable',
            'is_important' => 'required|integer',
            'is_completed' => 'required|integer',
        ];
    }

    /**
     *
     *
     * @return array
     */
    public function messages(){
        return [
            'date.date_format' => '日付は正しい形式で入力してください。',
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
        // 値の追加、調整
        $attributes = ['due_date' => $this->date];
        if (!$this->is_important) {
            $attributes['is_important'] = 0;
        }
        
        $this->merge($attributes);
    }
}
