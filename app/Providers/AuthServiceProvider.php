<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Dog;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        ////        Forbid access to edit and delete function for users who are not the original creator
        Gate::define('edit-dogs', function (User $user, Dog $dog) {
            return $user->is_admin || $user->id === $dog->user_id;
        });
        Gate::define('edit-users', function (User $user) {
            return $user->is_admin === $user->id;
        });
        Gate::define('is_admin', function (User $user) {
            return $user->is_admin;
        });
    }
}
