<?php

namespace KeyValueJson;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;

class KeyValueJsonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'keyvaluejson');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(KeyValueJsonFormField::class);
        $this->app->bind(
            'TCG\Voyager\Http\Controllers\VoyagerBaseController',
            'KeyValueJson\KeyValueJsonController'
        );
    }
}
