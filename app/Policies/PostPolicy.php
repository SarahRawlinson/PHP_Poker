<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function delete(User $user, Post $post): bool
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
