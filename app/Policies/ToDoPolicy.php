<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToDoPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param ToDo $todo
     * @return bool
     */
    public function update(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    /**
     * @param User $user
     * @param ToDo $todo
     * @return bool
     */
    public function delete(User $user, ToDo $todo): bool
    {
        return $user->id === $todo->user_id;
    }


    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
