<?php

namespace App\Listeners;

use App\Events\LoginHistory;
use App\Models\LoginHistoryItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class storeUserLoginHistory
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
     * @param  \App\Events\LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        $user = $event->user;

        $login_entry = new LoginHistoryItem;
        $login_entry->user_id = $user->id;
        $result = $login_entry->save();

        return $result;
    }
}
