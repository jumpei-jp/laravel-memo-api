<?php

namespace App\Http\Requests\Memo;

use Illuminate\Foundation\Http\FormRequest;

//---------------------------------------
//以下より追加
//---------------------------------------
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateMemoRequest extends FormRequest
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
            'id' => ['required', 'exists:memos'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ],400);

        throw new HttpResponseException($response);
    }

}
