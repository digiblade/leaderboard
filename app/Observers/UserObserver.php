<?php
namespace App\Observers;

use App\Jobs\GenerateQrCode;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        GenerateQrCode::dispatch($user);
    }
}
