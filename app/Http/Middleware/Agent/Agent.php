<?php

namespace App\Http\Middleware\Agent;

use App\Exceptions\ErrorCode;
use App\Library\Response;
use App\Models\AdminMenus;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class Agent
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 默认中文语言
        App::setLocale('zh-CN');
        $route = $request->path();
        switch ($route) {
            case 'api/agent/login';
            case 'api/agent/flush';
            case 'api/agent/upload_images';
                return $next($request);
                break;
            default;
                $res = self::LoginCheck($request);
                return self::Response($res, $next);
                break;
        }
    }


    // 登录状态监测
    public static function LoginCheck($request): array
    {
        // 从头部获取token
        $Xtoken = $request->header('Agent-Token');
        // 接收第一次传过来的token
        $token = $request->get('token');
        // token最终结果
        $token = empty($token) ? $Xtoken : $token;
        $info  = Cache::get($token);
        if (empty($info)) {
            // 登录过期，无法获取用户详细信息。请您退出后重新登录
            return Response::error([], ErrorCode::LG_Error3);
        } else {
            $expire = time() - $info['refresh_time'];
            // 半个小时后用户还在操作，延长用户的登录时间
            if ($expire > 1800) {
                $info['refresh_time'] = time();
                $time                 = 60 * 60 * 12;// 12 小时
                Cache::put($token, $info, $time);
            }
            // 将登录后的用户信息添加到request中
            $request->attributes->add(['info' => $info]);
            return self::ReArray(true, $request);
        }
    }

    // 登录状态监测
    public static function Response($res, Closure $next)
    {
        if ($res['data']['success']) {
            return $next($res['data']['response']);
        } else {
            return $res;
        }
    }


    // 中间件返回数据专用
    public static function ReArray($success, $response): array
    {
        $arr = [
            'data' => [
                'success'  => $success,
                'response' => $response
            ]
        ];
        return $arr;
    }
}
