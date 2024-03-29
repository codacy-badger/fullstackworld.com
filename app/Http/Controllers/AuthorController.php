<?php

namespace App\Http\Controllers;

use Wink\WinkAuthor;
use App\Models\WinkPost;

class AuthorController extends Controller
{
    public function index()
    {
        dd('Authors');
    }

    public function profile($username)
    {
        $author = WinkAuthor::where('slug', $username)->first();

        if (! $author) {
            return abort(404);
        }

        $posts = WinkPost::live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(10);

        return view('frontend.authors.profile', compact('author', 'posts'));
    }
}
