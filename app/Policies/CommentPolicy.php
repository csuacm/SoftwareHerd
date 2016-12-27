<?php

namespace SoftwareHerd\Policies;

use SoftwareHerd\User;
use SoftwareHerd\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \SoftwareHerd\User  $user
     * @param  \SoftwareHerd\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \SoftwareHerd\User  $user
     * @param  \SoftwareHerd\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        //
    }
}
