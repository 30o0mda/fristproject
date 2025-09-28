<?php

namespace App\Observers;

use App\Models\Example;
use App\Models\Test ;


class ExampleObserve
{
    /**
     * Handle the Example "created" event.
     */
    public function created(Test $example): void
    {
        //
    }

    /**
     * Handle the Example "updated" event.
     */
    public function updated(Test $example): void
    {
        //
    }

    /**
     * Handle the Example "deleted" event.
     */
    public function deleted(Test $example): void
    {
        //
    }

    /**
     * Handle the Example "restored" event.
     */
    public function restored(Test $example): void
    {
        //
    }

    /**
     * Handle the Example "force deleted" event.
     */
    public function forceDeleted(Test $example): void
    {
        //
    }
}
