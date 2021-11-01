<?php

namespace App\Http\Requests\Admin;

use App\Exceptions\ErrorCode;
use App\Library\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AccountCreate extends FormRequest
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
     * 请求失败返回json数据
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->json(Response::error([], ErrorCode::Vl_Error, $validator->errors()->first()), 200)));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account'    => 'required|string',
            'password'   => 'required|string|between:6,10',
            'authoritys' => 'required',
        ];
    }
}
