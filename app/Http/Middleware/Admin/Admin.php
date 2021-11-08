<?php

namespace App\Http\Middleware\Admin;

use App\Exceptions\ErrorCode;
use App\Library\Response;
use App\Models\AdminMenus;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 默认中文语言
        App::setLocale('zh-CN');
        $route = $request->path();
        switch ($route) {
            case 'api/admin/google_token';
            case 'api/admin/login';
            case 'api/admin/flush';
            case 'api/admin/upload_images';
            case 'api/admin/create_google_code';
            case 'api/admin/currency/trading_pair/generate_wallet';
                return $next($request);
                break;
            default;
                $res = self::LoginAndRoleCheck($request);
                return self::Response($res, $next);
                break;
        }
    }


    // 登录状态监测
    public static function LoginCheck($request)
    {
        // 从头部获取token
        $Xtoken = $request->header('Admin-Token');
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

    // 检测用户的登录和角色权限
    public static function LoginAndRoleCheck($request)
    {
        $res = self::LoginCheck($request);
        if ($res['data']['success']) {
            // 如果登录成功检测用户的权限
            return self::RoleCheck($request);
        } else {
            return $res;
        }
    }


    // 用户角色权限检测
    public static function RoleCheck($request)
    {
        $route = $request->path();
        // 从头部获取token
        $Xtoken = $request->header('Admin-Token');
        // 接收第一次传过来的token
        $token = $request->get('token');
        // token最终结果
        $token = empty($token) ? $Xtoken : $token;
        $info  = Cache::get($token);
        // 查找用户可访问路由
        if (empty($info['allow_routes'])) {
            $routes       = explode(',', $info['authoritys']);
            $authoritys   = AdminMenus::where('path_views', '<>', null)->whereIn('id', $routes)->pluck('path_views')->toArray();
            $public_route = config('route.admin');
            // 计算出用户所有允许访问的路由
            $allow_routes = array_merge($authoritys, $public_route);
            // 缓存角色可访问路由
            $info['allow_routes'] = $allow_routes;
            // 更新登录信息，同时缓存从新开始，12小时后失效
            $time = 60 * 60 * 12;// 12 小时
            Cache::put($token, $info, $time);
        } else {
            $allow_routes = $info['allow_routes'];
        }
        // 判断角色是否具备当前请求的路由
        if ($info['id'] != 1 && !in_array($route, $allow_routes)) {
            // 默认所有用户具备权限
//            return self::ReArray(true, $request);
            // 抱歉！您不具备权限！
            return Response::error([], ErrorCode::PERR_Error1);
        } else {
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
    public static function ReArray($success, $response)
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
