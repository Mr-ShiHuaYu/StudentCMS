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

        // 这里写这个isAdmin Gate只是为了兼容老版本,为了不修改blade中的@can('isAdmin')
        Gate::define('isAdmin', function ($user) {
            return $user->hasAnyRole(['admin','teacher']);
        });

        // 因为,这里写了全局的gate::before判断,如果是超级管理员,则所有权限都会有
        Gate::before(
            function ($user) {
                // 没有权限需要返回null,而不是false
                return $user->hasRole('admin') ? true : null;
            }
        );
    }
}
