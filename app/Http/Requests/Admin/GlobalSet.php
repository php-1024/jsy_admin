<?php

namespace App\Http\Requests\Admin;

use App\Exceptions\ErrorCode;
use App\Library\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GlobalSet extends FormRequest
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
            'site_name'            => 'required|between:1,300',    // 网站名称
            'download_link'        => 'between:1,300',             // 下载地址
            'kf_address'           => 'between:1,300',             // 客服地址
            'invitation_code'      => 'in:0,1',                   // 邀请码开关 1：开启，0：关闭
            'transaction_fees'     => 'string|between:1,300',     // 交易手续费 请填写百分比%
            'withdrawal_fees'      => 'string|between:1,300',     // 提现手续费 请填写百分比%
            'min_amount'           => 'string|between:1,300',     // 最低提现额
            'max_amount'           => 'string|between:1,300',     // 最大提现额
            'daily_cumulative'     => 'string|between:1,300',     // 日累计提现
            'max_number'           => 'string|between:1,300',     // 最大提现次数
            'is_withdraw'          => 'string|in:0,1',                   // 是否开启提现  1：开启，0：关闭
            'proxy_ratio'          => 'string|between:1,300',     // 代理红利比例  请填写百分比%
            'omni_wallet_address'  => 'string|between:1,300',             // 钱包收款地址
            'erc20_wallet_address' => 'string|between:1,300',             // 钱包收款地址
            'trc20_wallet_address' => 'string|between:1,300',             // 钱包收款地址
        ];
    }


    /**
     * 获取已定义的验证规则的错误消息。
     * @return array
     */
    public function messages(): array
    {
        return [
            'site_name.required'       => '请输入网站名称！',
            'site_name.between'        => '网站名称必须1-300个字符！',
            'download_link.between'    => '下载地址必须1-300个字符！',
            'kf_address.between'       => '客服地址必须1-300个字符',
            'invitation_code.in'       => '请设置邀请码开关',
            'transaction_fees.string'  => '请设置交易手续费，填写数字即可，单位默认为百分比',
            'transaction_fees.between' => '请设置交易手续费，填写数字即可，单位默认为百分比',
            'withdrawal_fees.string'   => '请设置提现手续费，填写数字即可，单位默认为百分比',
            'withdrawal_fees.between'  => '请设置提现手续费，填写数字即可，单位默认为百分比',
            'min_amount.string'        => '请设置最低提现额，填写数字即可',
            'min_amount.between'       => '请设置最低提现额，填写数字即可',
            'max_amount.string'        => '请设置最大提现额，填写数字即可',
            'max_amount.between'       => '请设置最大提现额，填写数字即可',
            'daily_cumulative.string'  => '请设置日累计提现，填写数字即可',
            'daily_cumulative.between' => '请设置日累计提现，填写数字即可',
            'max_number.string'        => '请设置最大提现次数，填写数字即可',
            'max_number.between'       => '请设置最大提现次数，填写数字即可',
            'proxy_ratio.string'       => '请设置代理红利比例，填写数字即可，单位默认为百分比',
            'proxy_ratio.between'      => '请设置代理红利比例，填写数字即可，单位默认为百分比',
        ];
    }
}
