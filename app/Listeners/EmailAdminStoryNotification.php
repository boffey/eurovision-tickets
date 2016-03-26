<?php

namespace App\Listeners;

use App\Events\StoriesWereAdded;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAdminStoryNotification
{
    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  StoriesWereAdded  $event
     * @return void
     */
    public function handle(StoriesWereAdded $event)
    {
        $this->mailer->send('emails.admin', ['stories' => $event->stories], function(Message $message)
        {
            $message->to(env('NEWS_REPORT_TO'));
            $message->subject('New Eurovision Stories');
        });
    }
}
