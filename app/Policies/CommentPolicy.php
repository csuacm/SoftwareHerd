<?php

namespace SoftwareHerd\Policies;

use SoftwareHerd\User;
use SoftwareHerd\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
}