<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
    public function handle(Login $event): void
    {
        /** @var \App\Models\User $user */
        $user = $event->user;

        if ($user) {
            activity('auth')
                ->causedBy($user)
                ->log('User berhasil login ke sistem');
        }
    }
}