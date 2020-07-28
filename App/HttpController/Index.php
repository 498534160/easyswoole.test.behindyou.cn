<?php


namespace App\HttpController;


use App\Utility\MyQueue;
use EasySwoole\Component\Timer;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Queue\Job;
use EasySwoole\RedisPool\Redis as RedisPool;
use EasySwoole\Redis\Redis;

class Index extends Controller
{

    public function index()
    {
        //模拟加入生产队列
        $timerId = Timer::getInstance()->loop(1000,function (){
            $workerArr = [
                '司机',
                '教师',
                '职员',
                '学生',
                '婴儿',
                '服务员',
                '三无'
            ];
            $job = new Job();
            $worker = $workerArr[ rand(0,6)];
            var_dump('来自生产者:' . $worker);
            $job->setJobData($worker);
            MyQueue::getInstance()->producer()->push($job);

            // TODO reids计数，到达技术点停止计时器
            go (function () {
                //invoke方式获取连接
                RedisPool::invoke('redis', function (Redis $redis){
                    $count = $redis->get('timer:worker:count');
                    if ($count >= 10) {
                        $timerId = $redis->get('timer:worker');
                        $redis->del('timer:worker:count','timer:worker');
                        var_dump(Timer::getInstance()->clear($timerId));
                        var_dump('生产者队列已停止');
                    } else {
                        $redis->incr('timer:worker:count');
                    }

                });
            });
        });

        // TODO 存储定时器计数
        go (function () use($timerId) {
            //invoke方式获取连接
            RedisPool::invoke('redis', function (Redis $redis)use($timerId) {
               $redis->set('timer:worker', $timerId);
            });
        });
    }

    protected function actionNotFound(?string $action)
    {

    }
}