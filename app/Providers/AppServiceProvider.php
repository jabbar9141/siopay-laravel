<?php

namespace App\Providers;

use App\Models\Smtp;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\Presets\Bootstrap;

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
        if (app()->environment('production')) {
            $this->app->bind('path.public', function () {
                return base_path('../public_html');
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $smtp = Smtp::first();
        if ($smtp) {
            $data = [
                'driver' => 'smtp',
                'host' => $smtp->mail_host,
                'port' => $smtp->mail_port,
                'encryption' => $smtp->mail_encreption,
                'username' => $smtp->mail_username,
                'password' => $smtp->mail_password,
                'from' => [
                    'address' => $smtp->mail_from_addressed,
                    'name' => 'LaravelStarter',
                ],
            ];


            Config::set('mail', $data);
            // dd($data);

        } else {
            dd('No SMTP configuration found');
        }
    }
}
