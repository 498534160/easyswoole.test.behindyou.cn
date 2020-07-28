<?php
return [
    'SERVER_NAME' => "EasySwoole",
    'MAIN_SERVER' => [
        'LISTEN_ADDRESS' => '0.0.0.0',
        'PORT' => 9520,
        'SERVER_TYPE' => EASYSWOOLE_WEB_SERVER, //可选为 EASYSWOOLE_SERVER  EASYSWOOLE_WEB_SERVER EASYSWOOLE_WEB_SOCKET_SERVER,EASYSWOOLE_REDIS_SERVER
        'SOCK_TYPE' => SWOOLE_TCP,
        'RUN_MODEL' => SWOOLE_PROCESS,
        'SETTING' => [
            'worker_num' => 8,
            'reload_async' => true,
            'max_wait_time'=>3
        ],
        'TASK'=>[
            'workerNum'=>4,
            'maxRunningNum'=>128,
            'timeout'=>15
        ]
    ],
    'TEMP_DIR' => null,
    'LOG_DIR' => null,




    /*################ MYSQL CONFIG ##################*/
//    'MYSQL' => [
//        'host'          => '192.168.75.1',
//        'port'          => '3306',
//        'user'          => 'root',
//        'timeout'       => '5',
//        'charset'       => 'utf8mb4',
//        'password'      => 'root',
//        'database'      => 'cry',
//        'POOL_MAX_NUM'  => '20',
//        'POOL_TIME_OUT' => '0.1',
//    ],

    /*################ REDIS CONFIG ##################*/
    'REDIS' => [
        'host'          => '127.0.0.1',
        'port'          => '6379',
        'auth'          => 'L8Aai3HPrJkwRMLP',
        'POOL_MAX_NUM'  => '20',
        'POOL_MIN_NUM'  => '5',
        'POOL_TIME_OUT' => '0.1',
    ],
    /*################ HOTRELOAD CONFIG ##################*/
    'HOTRELOAD' => 1
];
