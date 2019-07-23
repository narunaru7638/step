<?php

namespace App\Policies;

use App\User;
use App\Step;
use Illuminate\Auth\Access\HandlesAuthorization;

class StepPolicy
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

    public function view(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }
}
