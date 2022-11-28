<?php

namespace App\Policies;

use App\Models\PokerGame;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PokerGamePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param PokerGame $post
     * @return bool
     */
    public function update(User $user, PokerGame $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * @param User $user
     * @param PokerGame $post
     * @return bool
     */
    public function delete(User $user, PokerGame $post): bool
    {
        return $user->id === $post->user_id;
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
