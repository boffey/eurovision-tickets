<?php

namespace App\Console\Commands;

use App\Repositories\StoryRepository;
use Illuminate\Console\Command;
use App\Support\Eurovision\Parser;

class EurovisionParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eurovision:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that parses the eurovision.tv website for news stories.';

    protected $repository;

    /**
     * @param StoryRepository $repository
     */
    public function __construct(StoryRepository $repository)
    {
        $this->repository = $repository;

        Parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $parser = new Parser(getenv('NEWS_URL'));
        $stories = $parser->parseNewsFeed();
        $this->repository->saveStories($stories);

        /**
         * TODO:
         * fire of email to admins
         */
    }
}
