<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;

class FeedController extends Controller
{

    public function feed()
    {
        $stories = Story::orderBy('published', 'desc')->get();

        $feed = new Feed();

        $channel = new Channel();
        $channel
            ->title("Eurovision Ticket News Feed")
            ->description("Feed that displays the incoming news from the Eurovision.tv website")
            ->url(url('feed'))
            ->appendTo($feed);

        foreach($stories as $story) {
            $item = new Item();
            $item
                ->guid($story->id)
                ->pubDate($story->published->timestamp)
                ->title($story->title)
                ->description($story->title)
                ->url($story->url)
                ->appendTo($channel);
        }

        echo $feed;
    }

}
