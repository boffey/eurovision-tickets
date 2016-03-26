<?php namespace App\Repositories;

use App\Events\StoriesWereAdded;
use App\Support\Eurovision\Story;
use \Event;

class StoryEloquentRepository implements StoryRepository {

    protected $model;

    public function __construct(\App\Story $model) {
        $this->model = $model;
    }

    public function saveStory(Story $story)
    {
        if(!$this->storyExists($story)) {
            $elStory = \App\Story::create([
                'title' => $story->getTitle(),
                'url' => $story->getUrl(),
                'published' => $story->getDate(),
            ]);
            return true;
        }

        return false;
    }

    public function saveStories($stories)
    {
        $newStories = [];

        foreach($stories as $story) {
            $result = $this->saveStory($story);
            if($result) {
                $newStories[] = $story;
            }
        }

        if(count($newStories) > 0) {
            Event::fire(new StoriesWereAdded($newStories));
        }

        return $newStories;
    }

    public function getStories()
    {
        return $this->model->all();
    }

    public function getStoryById($id)
    {
        return $this->model->find($id);
    }

    private function storyExists(Story $story)
    {
        if($this->model->where('url', $story->getUrl())->first()) {
            return true;
        }

        return false;
    }

}