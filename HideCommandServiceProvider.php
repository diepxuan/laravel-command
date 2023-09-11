<?php

namespace Diepxuan\HideCommand;

use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider;
use Illuminate\Foundation\Providers\ComposerServiceProvider;

class HideCommandServiceProvider extends ConsoleSupportServiceProvider
{
    /**
     * The provider class names.
     *
     * @var string[]
     */
    protected $providers = [
        HideCommandArtisanServiceProvider::class,
        HideCommandMigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
