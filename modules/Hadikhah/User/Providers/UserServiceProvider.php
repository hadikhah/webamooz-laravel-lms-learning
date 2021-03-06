<?php

namespace Hadikhah\User\Providers;

use Hadikhah\User\Models\User;
use \Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        config()->set('auth.providers.users.model', User::class);
    }


    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');
        $this->loadFactoriesFrom(__DIR__ . '/../Database/Factories/');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'View');
    }

}
