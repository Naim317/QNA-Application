<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Question;
use App\Answer;


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


        \Gate::define('update-question', function($user, $question){
            return $user->id == $question->user_id ;

        });

        \Gate::define('delete-question', function($user, $question){
            return $user->id == $question->user_id ;

        });

        \Gate::define('update-answer', function($user, $answer){
            return $user->id == $answer->user_id ;

        });

        \Gate::define('delete-answer', function($user, $answer){
            return $user->id == $answer->user_id ;

        });
    }
}
