<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use App\Models\Order;
use App\Models\Platillo;
use App\Models\Catalogo;

use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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


        Gate::define("gestionar-datos", function (User $user){
            // Aquí puede existir otro funcionamiento lógico.	
        Return $user->rol === 'admin' ? Response::allow() : Response::deny('Debes de ser un administrador para entrar aquí!');
        });

        Gate::define("navBar", function (User $user){
            // Aquí puede existir otro funcionamiento lógico.	
        Return $user->rol === 'admin';
        });
        
        //
    }
}
