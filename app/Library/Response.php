<?php

namespace App\Library;

class Response
{
    static public function success($result = null, $statusCode = 200, $msg = null): array
    {
        if (!$msg && $statusCode) {
            $msg = __('errorcode.' . $statusCode);
        }
        return self::response($result, $msg, $statusCode);
    }


    static public function error($result = null, $statusCode = 419, $msg = null): array
    {
        if (!$msg && $statusCode) {
            $str     = "";
            $str_arr = explode("|", $statusCode);
            foreach ($str_arr as $val) {
                if (strstr($val, "LG")
                    || strstr($val, "WL")
                    || strstr($val, "MC")
                    || strstr($val, "ML")
                    || strstr($val, "MLG")
                    || strstr($val, "MM")
                    || strstr($val, "PER")
                    || strstr($val, "PERR")
                    || strstr($val, "VL")
                ) {
                    $str .= __("errorcode." . $val);
                } else {
                    $str .= $val;
                }
            }
            $msg = $str;
        }
        return self::response($result, $msg, $statusCode, false);
    }

    static public function response($result = null, $msg = null, $statusCode = 200, $success = true): array
    {
        return [
            'data' => [
                "code"    => (string)$statusCode,
                "success" => (bool)$success,
                "result"  => $result,
                "msg"     => (string)$msg
            ]
        ];
    }


}
