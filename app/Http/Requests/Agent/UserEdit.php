<?php

namespace App\Http\Requests\Agent;

use App\Exceptions\ErrorCode;
use App\Library\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserEdit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'id'             => 'required|numeric',
            'password'       => 'nullable|string|between:6,10',
            'risk_profit'    => 'nullable|numeric',
            'partner_level'  => 'nullable|in:0,1,2,3,4', // 0-普通 1-青铜 2-白银 3-黄金 4-铂金
            'agent_dividend' => 'nullable|numeric',
        ];
    }
}
