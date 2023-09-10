<?php

namespace Diepxuan\HideCommand;

use Symfony\Component\Console\Command\Command;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Artisan;

class HideCommandServiceProvider extends ServiceProvider
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

    public function boot()
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
            })
            ->only(self::$laravelDefaultCommands)
            ->map(function (Command $command) {
                $command->setHidden(true);
                return $command;
            })
            ->toArray();

        $this->commands($hideCommands);

        $this->commands([
            // \Diepxuan\HideCommand\HideCommand::class,
        ]);
    }
}
