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
            'download_link'        => 'between:1,300',             // APP下载地址
            'kfh5_address'         => 'between:1,300',             // 客服H5地址
            'kfapp_address'        => 'between:1,300',             // 客服APP地址
            'invitation_code'      => 'in:0,1',                   // 邀请码开关 1：开启，0：关闭
            'withdrawal_fees'      => 'string|between:1,300',     // 提现手续费 请填写百分比%
            'min_amount'           => 'string|between:1,300',     // 最低提现额
            'is_withdraw'          => 'string|in:0,1',                   // 是否开启提现  1：开启，0：关闭
            'increase_list'        => 'string|between:1,300',     // 首页3+涨幅榜 例如：btcusdt,ethusdt,etcusdt
            'omni_wallet_address'  => 'string|between:1,300',             // 钱包收款地址
            'erc20_wallet_address' => 'string|between:1,300',             // 钱包收款地址
            'trc20_wallet_address' => 'string|between:1,300',             // 钱包收款地址
            'google_token'         => 'string|in:0,1',                    // 谷歌动态口令 0-关闭 1-开启
            'ios_version'          => 'nullable|string|between:1,300',             // IOS版本号及下载地址
            'ios_url'              => 'nullable|string|between:1,300',             // IOS版本号及下载地址
            'android_version'      => 'nullable|string|between:1,300',             // 安卓版本号及下载地址
            'android_url'          => 'nullable|string|between:1,300',             // 安卓版本号及下载地址
        ];
    }


    /**
     * 获取已定义的验证规则的错误消息。
     * @return array
     */
    public function messages(): array
    {
        return [
            'site_name.required'           => '请输入网站名称！',
            'site_name.between'            => '网站名称必须1-300个字符！',
            'download_link.between'        => 'APP下载地址必须1-300个字符！',
            'kfh5_address.between'         => '客服H5地址必须1-300个字符',
            'kfapp_address.between'        => '客服APP地址必须1-300个字符',
            'invitation_code.in'           => '请设置邀请码开关',
            'withdrawal_fees.string'       => '请设置提现手续费，填写数字即可，单位默认为百分比',
            'withdrawal_fees.between'      => '请设置提现手续费，填写数字即可，单位默认为百分比',
            'min_amount.string'            => '请设置最低提现额，填写数字即可',
            'min_amount.between'           => '请设置最低提现额，填写数字即可',
            'increase_list.string'         => '请设置首页3+涨幅榜 例如：btcusdt,ethusdt,etcusdt',
            'increase_list.between'        => '请设置首页3+涨幅榜 例如：btcusdt,ethusdt,etcusdt',
            'omni_wallet_address.string'   => '请设置钱包收款地址1-300个字符',
            'omni_wallet_address.between'  => '请设置钱包收款地址1-300个字符',
            'erc20_wallet_address.string'  => '请设置钱包收款地址1-300个字符',
            'erc20_wallet_address.between' => '请设置钱包收款地址1-300个字符',
            'trc20_wallet_address.string'  => '请设置钱包收款地址1-300个字符',
            'trc20_wallet_address.between' => '请设置钱包收款地址1-300个字符',
            'ios_version.string'           => '请设置ios版本信息1-300个字符',
            'ios_version.between'          => '请设置ios版本信息1-300个字符',
            'ios_url.string'               => '请设置ios地址信息1-300个字符',
            'ios_url.between'              => '请设置ios地址信息1-300个字符',
            'android_version.string'       => '请设置安卓版本信息1-300个字符',
            'android_version.between'      => '请设置安卓版本信息1-300个字符',
            'android_url.string'           => '请设置安卓地址信息1-300个字符',
            'android_url.between'          => '请设置安卓地址信息1-300个字符',
        ];
    }
}
