<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
{
    /**
     * Handle the event.
     *
     * @param Logout $event
     * @return void
     */
    public function handle(Logout $event): void
    {
        /** @var \App\Models\User|null $user */
        $user = $event->user;

        if ($user) {
            activity('auth') // Masukkan nama log langsung di helper activity()
                ->causedBy($user)
                ->log('User berhasil logout dari sistem');
        }
    }
}