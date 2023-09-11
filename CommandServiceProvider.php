<?php

namespace Diepxuan\Command;

use Illuminate\Foundation\Providers\ArtisanServiceProvider as IlluminateProvider;
use Symfony\Component\Console\Command\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Artisan;

class CommandServiceProvider extends ServiceProvider
{
    private static $laravelDefaultCommands = [
        'about',
        'clear-compiled',
        'db',
        'docs',
        'down',
        'env',
        'help',
        'inspire',
        // 'list',
        'migrate',
        'optimize',
        'serve',
        // 'completion',
        'tinker',
        'up',
        'auth:clear-resets',
        'cache:*',
        'channel:list',
        'config:*',
        'db:*',
        'debugbar:clear',
        'env:*',
        'event:*',
        'key:generate',
        'lang:publish',
        'make:*',
        'migrate:*',
        'model:*',
        'notifications:table',
        'optimize:clear',
        'package:discover',
        'queue:*',
        'route:*',
        'schema:dump',
        'session:table',
        'storage:link',
        'stub:publish',
        'vendor:publish',
        'view:*',
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $this->app->booted(function () use ($events) {
            $this->hideLaravelCommands($events);
        });

        $this->commands([
            \Diepxuan\Command\Commands\HideCommand::class,
        ]);
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

    protected function hideLaravelCommands(Dispatcher $events = null)
    {
        $hideCommands = collect(Artisan::all())
            ->filter(function (Command $command) {
                return !$command->isHidden();
            })
            ->filter(function (Command $command) {
                return $command->isEnabled();
            })
            ->filter(function (Command $command) {
                foreach (self::$laravelDefaultCommands as $cmd) {
                    if (Str::of($command->getName())->is($cmd))
                        return true;
                }
                return false;
            })
            // ->only(self::$laravelDefaultCommands)
            ->map(function (Command $command) use ($events) {
                $command->setHidden(true);
                // if ($events)
                // $events->listen(ArtisanStarting::class, function ($event, $command) {
                //     $event->artisan->resolve($command->getName());
                // }, -1);
                return $command;
            })
            ->toArray();
        $this->commands($hideCommands);
    }
}
