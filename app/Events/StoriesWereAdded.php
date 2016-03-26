<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StoriesWereAdded extends Event
{
    use SerializesModels;

    public $stories;

    /**
     * @param $stories
     */
    public function __construct($stories)
    {
        $this->stories = $stories;
    }

}
