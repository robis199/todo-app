<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CounterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $target;

    public function __construct(int $target = 1000)
    {
        $this->target = $target;
    }

    public function handle()
    {
        for($i=0;$i<=$this->target;$i++){
            echo $i .PHP_EOL;
            sleep(1);
        }
    }
}
