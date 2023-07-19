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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Adoption' => 'App\Policies\AdoptionPolicy', ###
        #\App\Models\Adoption::class => \App\Models\AdoptionPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()#Gate $gate
    {
        #$this->registerPolicies($gate);#

        //
        #parent::registerPolicies($gate);
    }
}
