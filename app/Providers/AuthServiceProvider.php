<?php

namespace App\Providers;

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
// Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(
            function ($user, $ability) {
            // Gate::before rules need to return null rather than false, else it will interfere with normal policy operation
                return $user->hasRole('超级管理员') ? true : null;
            }
        );
//        Gate::define(
//            'isAdmin',
//            function ($user) {
//                return $user->is_admin
//                    ? Response::allow()
//                    : Response::deny('必须要管理员权限');
//            }
//        );
//
//        Gate::define(
//            'is_own',
//            function ($user, $want) {
//                if ($user->is_admin) {
//                    return true;
//                } else {
//                    return $user->id === $want->id;
//                }
//            }
//        );
    }
}
