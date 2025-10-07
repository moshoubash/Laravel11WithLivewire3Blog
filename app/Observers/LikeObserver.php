<?php

namespace App\Observers;

use App\Events\NewLike;
use App\Models\Like;
use App\Notifications\LikeNotification;

class LikeObserver
{
    /**
     * Handle the Like "created" event.
     */
    public function created(Like $like): void
    {
        $postAuthor = $like->post->user;
        $likeUser = $like->user;
        $post = $like->post;

        $postAuthor->notify(new LikeNotification($postAuthor, $likeUser, $post));
        broadcast(new NewLike());
    }

    /**
     * Handle the Like "updated" event.
     */
    public function updated(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "deleted" event.
     */
    public function deleted(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "restored" event.
     */
    public function restored(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "force deleted" event.
     */
    public function forceDeleted(Like $like): void
    {
        //
    }
}
