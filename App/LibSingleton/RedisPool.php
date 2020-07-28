<?php


namespace App\LibSingleton;


use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\RedisPool\Redis;

class RedisPool
{
    use Singleton;

    protected function __construct(...$arg)
    {
        $globalConfig = Config::getInstance();
        $config = $globalConfig->getConf('REDIS');
        if (!empty($config)) {
            $redisConfig = new RedisConfig($config);
            $redisPoolConfig = Redis::getInstance()->register('redis', $redisConfig);

            $redisPoolConfig->setMinObjectNum($config['POOL_MIN_NUM']);
            $redisPoolConfig->setMaxObjectNum($config['POOL_MAX_NUM']);
            $redisPoolConfig->setAutoPing($config['POOL_TIME_OUT']);
            var_dump('redis连接池启用');
        } else {
            var_dump('redis连接池未启用');
        }
    }
}