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

        // 管理者
    	Gate::define('admin', function ($user) {
    		return ($user->role == 100);
    	});

    	// 編集者
    	Gate::define('edit', function ($user) {
    		return ($user->role >= 50);
    	});

    	// 閲覧者
    	Gate::define('read', function ($user) {
    		return ($user->role > 0);
    	});
    }
}
