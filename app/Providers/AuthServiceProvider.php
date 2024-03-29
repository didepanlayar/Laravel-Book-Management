<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate Authorization
        Gate::define('manage-users', function($user) {
            return count(array_intersect(["Administrator"], json_decode($user->roles)));
        });

        Gate::define('manage-categories', function($user) {
            return count(array_intersect(["Administrator", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-books', function($user) {
            return count(array_intersect(["Administrator", "Staff"], json_decode($user->roles)));
        });

        Gate::define('manage-orders', function($user) {
            return count(array_intersect(["Administrator", "Staff"], json_decode($user->roles)));
        });
    }
}
