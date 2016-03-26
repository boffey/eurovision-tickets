<?php namespace App\Support\Eurovision;

use Carbon\Carbon;

class Story {

    private $title;
    private $url;
    private $date;

    public function __construct($title, $url, Carbon $date)
    {
        $this->title = $title;
        $this->url = $url;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }



}