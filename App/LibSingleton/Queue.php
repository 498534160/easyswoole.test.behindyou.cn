<?php


namespace App\LibSingleton;


use App\Utility\MyQueue;
use App\Utility\QueueProcess;
use EasySwoole\Component\Process\Manager;
use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\RedisPool\RedisPool;
use EasySwoole\Queue\Driver\Redis;
class Queue
{
    use Singleton;

    protected function __construct(...$arg)
    {
        $globalConfig = Config::getInstance();
        $config = $globalConfig->getConf('REDIS');
        if (!empty($config)) {
            $config = new RedisConfig($config);
            $redis = new RedisPool($config);
            $driver = new Redis($redis);
            MyQueue::getInstance($driver);
            //注册一个消费进程
            Manager::getInstance()->addProcess(new QueueProcess());
            var_dump('消费进程启用');
        } else {
            var_dump('消费未进程启用');
        }
    }
}