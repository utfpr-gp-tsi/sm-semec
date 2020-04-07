<?php

namespace App\Listeners;

use App\Events\EventDelete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use File;
use Illuminate\Support\Facades\DB;

class DeleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventDelete  $event
     * @return void
     */
    public function handle(EventDelete $event)
    {
        DB::table('users')->where('id', '=', $event->user->id)->delete();
        $file = public_path('/assets/' . $event->user->image);
        File::delete($file);
    }
}
