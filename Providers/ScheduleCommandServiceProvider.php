<?php

namespace Diepxuan\Command\Providers;

use Composer\InstalledVersions as ComposerPackage;
use Symfony\Component\Console\Command\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Diepxuan\System\Component\SplFileInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ReflectionClass;

class ScheduleCommandServiceProvider extends ServiceProvider
{

    private static $namespace = \Diepxuan\Command::class;

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        //
        $this->app->booted(function () use ($events) {
            $this->scheduleLaravelCommands($events);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->commands($this->load('Commands'));
    }

    /**
     * Register all of the commands in the given directory.
     *
     * @param  array|string  $paths
     * @return void
     */
    protected function scheduleLaravelCommands(Dispatcher $events = null)
    {
        //
    }
}
