<?php

namespace App\Events;

use App\Models\News;

class NewsCreated extends Event
{

    public $news;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }
}
