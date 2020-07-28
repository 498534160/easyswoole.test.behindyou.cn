<?php


namespace App\LibSingleton;


use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Config;
use EasySwoole\EasySwoole\ServerManager;
use EasySwoole\HotReload\HotReloadOptions;

class HotReload
{
    use Singleton;

    protected function __construct(...$arg)
    {
        $globalConfig = Config::getInstance();
        $status = $globalConfig->getConf('HOTRELOAD');
        if ($status) {
            $hotReloadOptions = new HotReloadOptions();
            $hotReload = new \EasySwoole\HotReload\HotReload($hotReloadOptions);
            $hotReloadOptions->setMonitorFolder([EASYSWOOLE_ROOT . '/App']);
            $server = ServerManager::getInstance()->getSwooleServer();
            $hotReload->attachToServer($server);
            var_dump('热重载启用');
        } else {
            var_dump('热重载未启用');
        }
    }
}