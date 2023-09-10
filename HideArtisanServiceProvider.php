<?php

namespace Diepxuan\HideCommand;

use Illuminate\Foundation\Providers\ArtisanServiceProvider as IlluminateProvider;
use Symfony\Component\Console\Command\Command;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Artisan;

use Illuminate\Auth\Console\ClearResetsCommand;
use Illuminate\Cache\Console\CacheTableCommand;
use Illuminate\Cache\Console\ClearCommand as CacheClearCommand;
use Illuminate\Cache\Console\ForgetCommand as CacheForgetCommand;
use Illuminate\Cache\Console\PruneStaleTagsCommand;
use Illuminate\Console\Scheduling\ScheduleClearCacheCommand;
use Illuminate\Console\Scheduling\ScheduleFinishCommand;
use Illuminate\Console\Scheduling\ScheduleInterruptCommand;
use Illuminate\Console\Scheduling\ScheduleListCommand;
use Illuminate\Console\Scheduling\ScheduleRunCommand;
use Illuminate\Console\Scheduling\ScheduleTestCommand;
use Illuminate\Console\Scheduling\ScheduleWorkCommand;
use Illuminate\Console\Signals;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Database\Console\DumpCommand;
use Illuminate\Database\Console\Factories\FactoryMakeCommand;
use Illuminate\Database\Console\MonitorCommand as DatabaseMonitorCommand;
use Illuminate\Database\Console\PruneCommand;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use Illuminate\Database\Console\ShowCommand;
use Illuminate\Database\Console\ShowModelCommand;
use Illuminate\Database\Console\TableCommand as DatabaseTableCommand;
use Illuminate\Database\Console\WipeCommand;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Foundation\Console\CastMakeCommand;
use Illuminate\Foundation\Console\ChannelListCommand;
use Illuminate\Foundation\Console\ChannelMakeCommand;
use Illuminate\Foundation\Console\ClearCompiledCommand;
use Illuminate\Foundation\Console\ComponentMakeCommand;
use Illuminate\Foundation\Console\ConfigCacheCommand;
use Illuminate\Foundation\Console\ConfigClearCommand;
use Illuminate\Foundation\Console\ConfigShowCommand;
use Illuminate\Foundation\Console\ConsoleMakeCommand;
use Illuminate\Foundation\Console\DocsCommand;
use Illuminate\Foundation\Console\DownCommand;
use Illuminate\Foundation\Console\EnvironmentCommand;
use Illuminate\Foundation\Console\EnvironmentDecryptCommand;
use Illuminate\Foundation\Console\EnvironmentEncryptCommand;
use Illuminate\Foundation\Console\EventCacheCommand;
use Illuminate\Foundation\Console\EventClearCommand;
use Illuminate\Foundation\Console\EventGenerateCommand;
use Illuminate\Foundation\Console\EventListCommand;
use Illuminate\Foundation\Console\EventMakeCommand;
use Illuminate\Foundation\Console\ExceptionMakeCommand;
use Illuminate\Foundation\Console\JobMakeCommand;
use Illuminate\Foundation\Console\KeyGenerateCommand;
use Illuminate\Foundation\Console\LangPublishCommand;
use Illuminate\Foundation\Console\ListenerMakeCommand;
use Illuminate\Foundation\Console\MailMakeCommand;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Foundation\Console\NotificationMakeCommand;
use Illuminate\Foundation\Console\ObserverMakeCommand;
use Illuminate\Foundation\Console\OptimizeClearCommand;
use Illuminate\Foundation\Console\OptimizeCommand;
use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Illuminate\Foundation\Console\PolicyMakeCommand;
use Illuminate\Foundation\Console\ProviderMakeCommand;
use Illuminate\Foundation\Console\RequestMakeCommand;
use Illuminate\Foundation\Console\ResourceMakeCommand;
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Foundation\Console\RouteClearCommand;
use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Foundation\Console\RuleMakeCommand;
use Illuminate\Foundation\Console\ScopeMakeCommand;
use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Foundation\Console\StubPublishCommand;
use Illuminate\Foundation\Console\TestMakeCommand;
use Illuminate\Foundation\Console\UpCommand;
use Illuminate\Foundation\Console\VendorPublishCommand;
use Illuminate\Foundation\Console\ViewCacheCommand;
use Illuminate\Foundation\Console\ViewClearCommand;
use Illuminate\Foundation\Console\ViewMakeCommand;
use Illuminate\Notifications\Console\NotificationTableCommand;
use Illuminate\Queue\Console\BatchesTableCommand;
use Illuminate\Queue\Console\ClearCommand as QueueClearCommand;
use Illuminate\Queue\Console\FailedTableCommand;
use Illuminate\Queue\Console\FlushFailedCommand as FlushFailedQueueCommand;
use Illuminate\Queue\Console\ForgetFailedCommand as ForgetFailedQueueCommand;
use Illuminate\Queue\Console\ListenCommand as QueueListenCommand;
use Illuminate\Queue\Console\ListFailedCommand as ListFailedQueueCommand;
use Illuminate\Queue\Console\MonitorCommand as QueueMonitorCommand;
use Illuminate\Queue\Console\PruneBatchesCommand as QueuePruneBatchesCommand;
use Illuminate\Queue\Console\PruneFailedJobsCommand as QueuePruneFailedJobsCommand;
use Illuminate\Queue\Console\RestartCommand as QueueRestartCommand;
use Illuminate\Queue\Console\RetryBatchCommand as QueueRetryBatchCommand;
use Illuminate\Queue\Console\RetryCommand as QueueRetryCommand;
use Illuminate\Queue\Console\TableCommand;
use Illuminate\Queue\Console\WorkCommand as QueueWorkCommand;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Session\Console\SessionTableCommand;

class HideArtisanServiceProvider extends IlluminateProvider
{
    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        // 'About' => AboutCommand::class,
        // 'CacheClear' => CacheClearCommand::class,
        // 'CacheForget' => CacheForgetCommand::class,
        // 'ClearCompiled' => ClearCompiledCommand::class,
        // 'ClearResets' => ClearResetsCommand::class,
        // 'ConfigCache' => ConfigCacheCommand::class,
        // 'ConfigClear' => ConfigClearCommand::class,
        // 'ConfigShow' => ConfigShowCommand::class,
        // 'Db' => DbCommand::class,
        // 'DbMonitor' => DatabaseMonitorCommand::class,
        // 'DbPrune' => PruneCommand::class,
        // 'DbShow' => ShowCommand::class,
        // 'DbTable' => DatabaseTableCommand::class,
        // 'DbWipe' => WipeCommand::class,
        // 'Down' => DownCommand::class,
        // 'Environment' => EnvironmentCommand::class,
        // 'EnvironmentDecrypt' => EnvironmentDecryptCommand::class,
        // 'EnvironmentEncrypt' => EnvironmentEncryptCommand::class,
        // 'EventCache' => EventCacheCommand::class,
        // 'EventClear' => EventClearCommand::class,
        // 'EventList' => EventListCommand::class,
        // 'KeyGenerate' => KeyGenerateCommand::class,
        // 'Optimize' => OptimizeCommand::class,
        // 'OptimizeClear' => OptimizeClearCommand::class,
        // 'PackageDiscover' => PackageDiscoverCommand::class,
        // 'PruneStaleTagsCommand' => PruneStaleTagsCommand::class,
        // 'QueueClear' => QueueClearCommand::class,
        // 'QueueFailed' => ListFailedQueueCommand::class,
        // 'QueueFlush' => FlushFailedQueueCommand::class,
        // 'QueueForget' => ForgetFailedQueueCommand::class,
        // 'QueueListen' => QueueListenCommand::class,
        // 'QueueMonitor' => QueueMonitorCommand::class,
        // 'QueuePruneBatches' => QueuePruneBatchesCommand::class,
        // 'QueuePruneFailedJobs' => QueuePruneFailedJobsCommand::class,
        // 'QueueRestart' => QueueRestartCommand::class,
        // 'QueueRetry' => QueueRetryCommand::class,
        // 'QueueRetryBatch' => QueueRetryBatchCommand::class,
        // 'QueueWork' => QueueWorkCommand::class,
        // 'RouteCache' => RouteCacheCommand::class,
        // 'RouteClear' => RouteClearCommand::class,
        // 'RouteList' => RouteListCommand::class,
        // 'SchemaDump' => DumpCommand::class,
        // 'Seed' => SeedCommand::class,
        'ScheduleFinish' => ScheduleFinishCommand::class,
        'ScheduleList' => ScheduleListCommand::class,
        'ScheduleRun' => ScheduleRunCommand::class,
        'ScheduleClearCache' => ScheduleClearCacheCommand::class,
        'ScheduleTest' => ScheduleTestCommand::class,
        'ScheduleWork' => ScheduleWorkCommand::class,
        'ScheduleInterrupt' => ScheduleInterruptCommand::class,
        // 'ShowModel' => ShowModelCommand::class,
        // 'StorageLink' => StorageLinkCommand::class,
        // 'Up' => UpCommand::class,
        // 'ViewCache' => ViewCacheCommand::class,
        // 'ViewClear' => ViewClearCommand::class,
    ];

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $devCommands = [
        // 'CacheTable' => CacheTableCommand::class,
        // 'CastMake' => CastMakeCommand::class,
        // 'ChannelList' => ChannelListCommand::class,
        // 'ChannelMake' => ChannelMakeCommand::class,
        // 'ComponentMake' => ComponentMakeCommand::class,
        // 'ConsoleMake' => ConsoleMakeCommand::class,
        // 'ControllerMake' => ControllerMakeCommand::class,
        // 'Docs' => DocsCommand::class,
        // 'EventGenerate' => EventGenerateCommand::class,
        // 'EventMake' => EventMakeCommand::class,
        // 'ExceptionMake' => ExceptionMakeCommand::class,
        // 'FactoryMake' => FactoryMakeCommand::class,
        // 'JobMake' => JobMakeCommand::class,
        // 'LangPublish' => LangPublishCommand::class,
        // 'ListenerMake' => ListenerMakeCommand::class,
        // 'MailMake' => MailMakeCommand::class,
        // 'MiddlewareMake' => MiddlewareMakeCommand::class,
        // 'ModelMake' => ModelMakeCommand::class,
        // 'NotificationMake' => NotificationMakeCommand::class,
        // 'NotificationTable' => NotificationTableCommand::class,
        // 'ObserverMake' => ObserverMakeCommand::class,
        // 'PolicyMake' => PolicyMakeCommand::class,
        // 'ProviderMake' => ProviderMakeCommand::class,
        // 'QueueFailedTable' => FailedTableCommand::class,
        // 'QueueTable' => TableCommand::class,
        // 'QueueBatchesTable' => BatchesTableCommand::class,
        // 'RequestMake' => RequestMakeCommand::class,
        // 'ResourceMake' => ResourceMakeCommand::class,
        // 'RuleMake' => RuleMakeCommand::class,
        // 'ScopeMake' => ScopeMakeCommand::class,
        // 'SeederMake' => SeederMakeCommand::class,
        // 'SessionTable' => SessionTableCommand::class,
        // 'Serve' => ServeCommand::class,
        // 'StubPublish' => StubPublishCommand::class,
        // 'TestMake' => TestMakeCommand::class,
        // 'VendorPublish' => VendorPublishCommand::class,
        // 'ViewMake' => ViewMakeCommand::class,
    ];

    public function boot()
    {
        //
    }
}
