<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Wink\WinkPost;
use Wink\WinkTag;

class CreateSitemap extends Command
{
    protected $signature = 'sitemap:create';

    protected $description = 'Create Sitemap';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $sitemap = App::make('sitemap');

        $sitemap->add(URL::to('/'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(URL::to('/blog'), Carbon::now(), '1.0', 'weekly');

        $tags = WinkTag::all();

        foreach ($tags as $tag) {
            $sitemap->add(URL::to($tag->slug), Carbon::now(), '0.9', 'weekly');
        }

        $posts = WinkPost::all();

        foreach ($posts as $post) {
            $sitemap->add(URL::to($post->slug), Carbon::now(), '0.9', 'weekly');
        }

        $sitemap->store('xml', 'sitemap');

        app('sentry')->captureMessage('Sitemap generated: '. date('Y-m-d h:i:s'));

        $this->info('Sitemap created!');
    }
}