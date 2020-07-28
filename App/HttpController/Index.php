<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\RedisPool\Redis;
use EasySwoole\Redis\Redis as RedisClient;

class Index extends Controller
{

    public function index()
    {
        Redis::invoke('redis', function (RedisClient $redis) {
            $redis->set('test', 'hello world');
        });
    }

    protected function actionNotFound(?string $action)
    {

    }
}