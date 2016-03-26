<?php namespace App\Repositories;

use App\Support\Eurovision\Story;
use Carbon\Carbon;

interface StoryRepository {

    public function saveStory(Story $story);
    public function saveStories($stories);
    public function getStories();
    public function getStoryById($id);

}