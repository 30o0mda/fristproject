<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserLoggedinHistory;
use Request;

class LoginHistory
{
    /**
     * Create the event listener.
     */
    public function __construct()

    {


        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
          UserLoggedinHistory::create([
            'name'=>$event->user->name,
            'email'=>$event->user->email,
            'ip'=>\request()->ip(),
            'user_agent'=>request::header('User-Agent'),

          ]);
    }
}
