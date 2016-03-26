<?php namespace App\Support\Eurovision;

use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;

class Parser {

    private $news_url;
    private $crawler;

    public function __construct($news_url)
    {
        $this->news_url = $news_url;
        $this->crawler = new Crawler();
    }

    public function parseNewsFeed()
    {
        $this->crawler->addHtmlContent($this->getPageContent());
        $stories = $this->getStories();

        return $stories;
    }

    private function getPageContent()
    {
        return file_get_contents($this->news_url);
    }

    private function getStories()
    {
        return $this->crawler->filter('.item-Story > article')->each(function($story){
            return $this->getStoryDetails($story);
        });
    }

    private function getStoryDetails($story)
    {
        $title = $story->filter('div.corner h1')->text();
        $url = $story->filter('div.corner a')->attr('href');
        $date = new Carbon($story->filter('time')->attr('datetime'));

        return new Story($title, $url, $date);
    }

}