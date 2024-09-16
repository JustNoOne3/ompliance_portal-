<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    public function creating(User $user): void
    {
        $user->password_expires_at = now()->addDays(180);
        DB::table('model_has_roles')->insert([
            'role_id' => DB::table('roles')->where('name', 'user')->value('id'),
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);
        
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
