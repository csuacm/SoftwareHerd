<?php

namespace SoftwareHerd\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'SoftwareHerd\Model' => 'SoftwareHerd\Policies\ModelPolicy',
        'SoftwareHerd\Project' => 'SoftwareHerd\Policies\ProjectPolicy',
        'SoftwareHerd\Comment' => 'SoftwareHerd\Policies\CommentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
