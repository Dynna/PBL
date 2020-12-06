<?php

namespace App\Policies;

use App\Post;
use App\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Users  $users
     * @return mixed
     */
    public function viewAny(Users $users)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Users  $users
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Users $users, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Users  $users
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Users $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Users  $users
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Users $users, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Users  $users
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(Users $user, Post $post)
    {
        //return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Users  $users
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(Users $users, Post $post)
    {
        //
    }
}
