<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Favourite;
use App\Models\User;
use App\Policies\FavouritePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Favourite::class => FavouritePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define(
            'custom-validate',
            function (User $user, Contact $contact) {
                return $user->id === $contact->user_id;
            }



        );
    }
}
