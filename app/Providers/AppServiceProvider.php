<?php

namespace App\Providers;

use App\Services\Banner\CostCalculator;
use App\Services\Sms\SmsRu;
use App\Services\Sms\SmsSender;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
//        $this->app->singleton(SmsSender::class, function (Application $app) {
//            $config = $app->make('config')->get('sms');
//            if (!empty($config['url'])) {
//                return new SmsRu($config['app_id'], $config['url']);
//            }
//            return new SmsRu($config['app_id']);
//        });
        $this->app->singleton(CostCalculator::class, function (Application $app) {
            $config = $app->make('config')->get('banner');
            return new CostCalculator($config['price']);
        });

        Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
