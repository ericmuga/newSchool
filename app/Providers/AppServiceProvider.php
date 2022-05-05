<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Relations\Relation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        Inertia::share('errors', fn()=> session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object) []);
        Inertia::share('flash.message', fn()=> session()->get('flash.message') ? session()->get('flash.message'): (object) []);
        Inertia::share('flash.type', fn()=> session()->get('flash.type') ? session()->get('flash.type'): (object) []);


        Inertia::share('appName', config('app.name'));

        Inertia::share('auth.user', fn (Request $request) => $request->user()
            ? array_merge($request->user()->only('id', 'name', 'email'),['gravatar'=>Gravatar::get($request->user()->email)])
            : null
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Relation::enforceMorphMap([
        //     'member' => 'App\Models\Member',
        //     'guest' => 'App\Models\Guest',
        //     'instance'=>'App\Models\Instance',
        //     'makeup'=>'App\Models\Makeup',
        //     'physical'=>'App\Models\PhysicalMeeting',

        // ]);

        JsonResource::withoutWrapping();
    }
}
