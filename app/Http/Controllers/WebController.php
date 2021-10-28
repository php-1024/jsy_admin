<?php

namespace App\Http\Controllers;


use Iszmxw\MysqlMarkdown\Mysql;

class WebController extends Controller
{
    public function mysql()
    {
        $config = config('database.connections.mysql');
        Mysql::markdown([
            'dbs'          => 'mysql',
            'host'         => $config['host'],
            'port'         => $config['port'],
            'charset'      => $config['charset'],
            'name'         => $config['database'],
            'user'         => $config['username'],
            'password'     => $config['password'],
            "reverse_null" => [0 => 1]
        ]);
        Mysql::markdown($config);
    }
}
