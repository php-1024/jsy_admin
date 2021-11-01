<?php

namespace App\Http\Controllers\Proxy;

use App\Exceptions\ErrorCode;
use App\Http\Requests\Proxy\AgentLogin;
use App\Library\Response;
use App\Library\Tools;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
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
    public function login(AgentLogin $request): array
    {
        // 接收登录账号和密码
        $email    = $request->get('email');
        $password = $request->get('password');
        // 密码加密处理
        $passwd = Tools::md5($password);
        // 查询账号信息
        $agent = User::getOne(['email' => $email]);
        if ($agent) {
            if ($agent['status']) {// 状态： 0正常 1，已锁定
                return Response::error([], ErrorCode::LG_Error2, '用户状态不正常或者已锁定');
            }
            if (!$agent['is_agent']) {// 是否代理： 0：不是   1：是
                return Response::error([], ErrorCode::LG_Error2, '非代理用户禁止登录');
            }
            if ($passwd != $agent['password']) {
                return Response::error([], ErrorCode::LG_Error2, '用户状态不正常或者已锁定');
            }
            $token = Uuid::uuid1()->getHex();
            // 生成登录用户的信息
            $info                  = $agent;
            $info['token']         = $token;
            $info['sub_user_path'] = "{$info['id']},";
            $info['login_time']    = time();
            $info['refresh_time']  = time();
            // 单位秒
            $time = 60 * 60 * 12;// 12 小时
            Cache::add($token, $info, $time);
            return Response::success([
                'agent_id' => $info['id'],
                'token'    => $token,
            ]);
        } else {
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
     * 获取登录用户信息
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/10/4 19:11
     */
    public function info(Request $request): array
    {
        $info = $request->get('info');
        $data = [
            'agent_id'     => $info['id'],
            'email'        => $info['email'],
            'avatar'       => config('app.url') . '/images/user.gif',
            'token'        => $info['token'],
            'nickname'     => $info['nickname'],
            'status'       => $info['status'],
            'share_code'   => $info['share_code'],
            'share_url'    => config('agent.share_url') . $info['share_code'],
            'login_time'   => $info['login_time'],
            'refresh_time' => $info['refresh_time']
        ];
        return Response::success($data);
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
}
