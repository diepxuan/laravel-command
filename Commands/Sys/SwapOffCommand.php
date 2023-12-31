<?php

namespace Diepxuan\Command\Commands\Sys;

use Diepxuan\System\OperatingSystem as OS;
use Diepxuan\Command\Commands\Command;

class SwapOffCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys:swap:off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable Swap Storage for vm.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->output->writeln(OS::sysSwapOff());
    }
}
