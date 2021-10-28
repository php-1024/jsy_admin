<?php

namespace App\Library;


class Tools
{

    // 加密密码
    static public function md5($password = null, $year = 2021): string
    {
        if ($password) {
            return md5(md5($password . env('PW_SALT')) . $year);
        }
        return "";
    }


    // 获取菜单树
    static public function getTree($data, $parent_id): array
    {
        $tree = [];
        if ($data) {
            foreach ($data as $k => $v) {
                if ($v['parent_id'] == $parent_id) {
                    //父亲找到儿子
                    $child = self::getTree($data, $v['id']);
                    if ($child) {
                        $v['child'] = $child;
                    }
                    $tree[] = $v;
                    //unset($data[$k]);
                }
            }
        }
        return $tree;
    }


    static public function getParentId($user_level, $user_path)
    {
        if ($user_level <= 1 || is_null($user_path)) {
            return 0;
        }
        $arr = explode(',', $user_path);
        return $arr[$user_level - 2];
    }


}
