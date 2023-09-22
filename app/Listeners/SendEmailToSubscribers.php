<?php

namespace App\Listeners;

use App\Models\Post;
use App\Models\Subscriber;
use App\Mail\PublishedNewPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToSubscribers
{
    public function __construct(public Post $post)
    {
    }

    public function handle(object $event): void
    {
        // Get Subscribers
        // You may need to filter the confirmed subscribers only by confirmed() custom scope.
        $subscribers = Subscriber::confirmed()->get();

        // Send email to all of them
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new PublishedNewPost($this->post));
        }
    }
}
