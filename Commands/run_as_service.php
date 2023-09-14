<?php

namespace Diepxuan\Command\Commands;

use Illuminate\Support\Facades\Artisan;
use Diepxuan\Command\Commands\Command;

class run_as_service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run_as_service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Package run as service';

    private $timer = [
        'do_every_minute' => ["H:i", null],
        'do_every_second' => ["H:i:s", null],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->timer();
    }

    protected function timer($timer = 0)
    {
        $now = time();

        foreach ($this->timer as $methodTodo => $timeTodo) {
            if (!is_callable(__CLASS__ . "::" . $methodTodo)) continue;
            if ($timeTodo[1] == date($timeTodo[0], $now)) continue;
            if (strtotime($timeTodo[1]) >= $now) continue;

            $this->timer[$methodTodo][1] = date($timeTodo[0], $now);
            $this->$methodTodo();
        }

        sleep(1);

        $this->timer();
    }

    protected function do_every_minute()
    {
        // $this->info(__METHOD__ . $this->timer[__FUNCTION__][1]);

        $this->call('vm:update');
        $this->call('app:csf:config');
        $this->call('sys:service:valid');
    }
    protected function do_every_second()
    {
        $this->info(__METHOD__ . $this->timer[__FUNCTION__][1]);
        // Artisan::call('vm:update');
    }
}
