<?php

namespace App\Policies;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostPolicy
{
    public function update(User $user ,Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user ,Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}
