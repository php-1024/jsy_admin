<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ErrorCode;
use App\Library\PHPGangsta_GoogleAuthenticator;
use App\Library\Response;
use App\Library\Tools;
use App\Models\Admin;
use App\Models\AdminLoginLog;
use App\Models\AdminOperationLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Iszmxw\IpAddress\Address;
use Ramsey\Uuid\Uuid;

class LoginController extends Controller
{
    /**
     * 登录
     * @param Request $request
     * @return array
     * @throws \Throwable
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/4 19:12
     */
    public function login(Request $request): array
    {
        // 用户ip
        $ip = $request->getClientIp();
//        $address = Address::address($ip);
        // 接收登录账号和密码
        $username = $request->get('username');
        $password = $request->get('password');

        /**********谷歌验证码验证 start************/
        $code = $request->get('code');//谷歌验证码
        $secret = $request->get('secret');//扫码生成的秘钥

        $obj = new PHPGangsta_GoogleAuthenticator();
        if (empty($code) && strlen($code) != 6){
            return Response::error([], ErrorCode::Login,'请正确输入手机上Google验证码');
        }
        $res = $obj->verifyCode($secret,$code);
        if (!$res){
            return Response::error([], ErrorCode::Login,'请正确输入手机上Google验证码');
        }
        /**********谷歌验证码验证 end************/

        // 密码加密处理
        $passwd = Tools::md5($password);
        // 查询账号信息
        $account = Admin::getOne(['account' => $username]);
        if ($account['status'] == -1)
            return Response::error([], ErrorCode::LG_StatusError1);
        // 密码输入正确，登录成功 $account['level']==1为管理员用户，仅管理员以登录后台
        if ($passwd == $account['password']) {
            $token = Uuid::uuid1()->getHex();
            // 生成登录用户的信息
            $info                 = $account;
            $info['token']        = $token;
            $info['login_time']   = time();
            $info['refresh_time'] = time();
            Redis::select(1);
            $value = Redis::get($info['id']);
            if ($value){
                Cache::forget($value);
                Redis::del($info['id']);
            }
            DB::beginTransaction();
            try {
                // 单位秒
                $time = 60 * 60 * 12;// 12 小时
                Cache::add($token, $info, $time);
                Redis::set($info['id'],(string)$token);
                AdminLoginLog::AddData([
                    'account_id' => $info['id'],
                    'account'    => $info['account'],
                    'token'      => $token,
                    'ip'         => $ip,
                    //                    'address'    => $address['location'],
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                AdminOperationLog::AddData([
                    'account_id' => $account['id'],
                    'content'    => '登陆失败，账号和密码输入不正确',
                    'token'      => (string)$token,
                    'headers'    => json_encode($request->headers->all()),
                    'ip'         => (string)$request->ip(),
                    'path'       => $request->path(),
                    'data'       => json_encode($request->all()),
                    'abnormal'   => $e->getMessage(),
                ]);
                // 登录失败请刷新后再试！
                return Response::error([], ErrorCode::LG_Error1);
            }
            return Response::success([
                'admin_id' => $info['id'],
                'token'    => $token,
            ]);
        } else {
            // 账号密码不正确！
            return Response::error([], ErrorCode::LG_Error2);
        }
    }

    /**
     * 退出登录
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/4 19:12
     */
    public function logout(Request $request)
    {
        $token = $request->get('token');
        Cache::forget($token);
        return ['code' => 20000, 'data' => 'success'];
    }


    /**
     * 清除服务器的所有缓存
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/4 19:12
     */
    public function flush()
    {
        Cache::flush();
    }

    /**
     * 创建谷歌验证码
     */
    public function create_google_code(): array
    {
        // 创建谷歌验证码
        // 生成二维码
        $ga = new PHPGangsta_GoogleAuthenticator();
        $secret = $ga->createSecret();

        $qrCodeUrl = $ga->getQRCodeGoogleUrl('身份验证', $secret);

        $oneCode = $ga->getCode($secret);//生成code

        return Response::success([
            'secret' => $secret,
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    }
}
