<?php

namespace Diepxuan\HideCommand;

use Illuminate\Support\ServiceProvider;

class HideCommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            \Diepxuan\HideCommand\HideCommand::class,
        ]);
    }
}
