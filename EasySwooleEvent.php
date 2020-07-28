<?php
namespace EasySwoole\EasySwoole;


use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {
        // TODO: Implement mainServerCreate() method.
//        $config = new Config();
//        $redisConfig1 = new RedisConfig([
//            'host'      => '127.0.0.1',
//            'port'      => '6379'
//        ]);
//
//        // 这里的redis连接池看文档配吧
//        Manager::getInstance()->register(new RedisPool($config,$redisConfig1),'redis');
//
//        //TODO:: 延迟队列消费进程
//        $processConfig= new \EasySwoole\Component\Process\Config();
//        $processConfig->setProcessName('testProcess');
//
//        \EasySwoole\Component\Process\Manager::getInstance()->addProcess(new Consumer($processConfig));
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        // TODO: Implement onRequest() method.
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}