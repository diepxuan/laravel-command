<?php

namespace Diepxuan\Command\Providers;

use Symfony\Component\Console\Command\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use ReflectionClass;
use SplFileInfo;
use Artisan;
use Diepxuan\Command\Commands\Vpn\Vpn;
use Diepxuan\Command\Commands\Vpn\Tailscale;
use Diepxuan\Command\Commands\Vpn\WireGuard;

class LoadCommandServiceProvider extends ServiceProvider
{

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Vpn::class,
            Tailscale::class,
            WireGuard::class,
        ]);
    }
}
