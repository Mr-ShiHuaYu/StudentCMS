<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;

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
        // 因为,这里写了全局的gate::before判断,所以,我没有定义isAdmin的Gate,管理员也会通过认证,一旦注释掉这里,那么,即使有管理员权限也不会返回true
        Gate::before(
            function ($user) {
                // Gate::before rules need to return null rather than false, else it will interfere with normal policy operation
                return $user->hasRole('超级管理员') ? true : null;
            }
        );
    }
}
