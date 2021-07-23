<?php

namespace App\Providers;

use App\Mixins\StrMixin;
use App\Models\Todo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::share('name', 'Laravel Provider');

        if (request()->has('active')) {
            View::share('active', request('active'));
        }
        if (request()->has('sort')) {
            return request('sort');
        }
        $this->app->singleton('continue', TestClass::class);
        $this->app->bind('reload', TestClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['todo.*', 'user.*'], function ($view) {
            $view->with('todo_index', 'Todo Index');
            $view->with('todo_1', 'Todo 1');
            $view->with('todos', Todo::all());
            return $view;
        });

        Str::macro('todo', function () {
            return 'marcro todo';
        });

        Str::mixin(new StrMixin);
    }
}
