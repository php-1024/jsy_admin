<?php

namespace App\Http\Requests\Admin;

use App\Exceptions\ErrorCode;
use App\Library\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApplyBuySetupValidate extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'                 => 'required|string',
            'currency_name.*.name' => 'required|string|in:USDT,BTC,ETH',
            'estimated_time'       => 'required|date_format:Y-m-d H:i:s',
            'start_time'           => 'required|date_format:Y-m-d H:i:s',
            'end_time'             => 'required|date_format:Y-m-d H:i:s',
            'code'                 => 'required|string|nullable',
            'code_status'          => 'required|in:0,1|numeric',
        ];
    }
}
