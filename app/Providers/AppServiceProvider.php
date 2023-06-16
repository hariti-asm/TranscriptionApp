<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\TranscribeNotes;
use App\Services\AudioProcessor;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bindMethod([TranscribeNotes::class, 'handle'], function (TranscribeNotes $job, Application $app) {
            return $job->handle($app->make(AudioProcessor::class));
        });
    }
}
