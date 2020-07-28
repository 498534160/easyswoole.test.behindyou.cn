<?php


namespace App\Utility;


use EasySwoole\Component\Process\AbstractProcess;
use EasySwoole\Queue\Job;

class QueueProcess extends AbstractProcess
{
    protected function run($arg)
    {
        var_dump('消费队列启用');
        go (function () {
            MyQueue::getInstance()->consumer()->listen(function (Job $job) {
                sleep(2);
                var_dump('消费队列获取的值' .$job->getJobData());
            });
        });
    }
}