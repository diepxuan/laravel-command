<?php

namespace Diepxuan\Command\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

use Diepxuan\Command\Providers\HideCommandServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            HideCommandServiceProvider::class,
        ];
    }
}
