<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define(
            'isAdmin',
            function ($user) {
                return $user->is_admin
                    ? Response::allow()
                    : Response::deny('必须要管理员权限');
            }
        );

        Gate::define(
            'is_own',
            function ($user, $want) {
                if ($user->is_admin) {
                    return true;
                } else {
                    return $user->id === $want->id;
                }
            }
        );
    }
}
