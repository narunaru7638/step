<?php

namespace App\Policies;

use App\User;
use App\Progress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgressPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }
    public function view(User $user, Progress $progress)
    {
        return $user->id === $progress->challenge->user_id;
//        return $user->id === $progress->id;

    }

}
