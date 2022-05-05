<?php

namespace DanielWinning\StaticMarkdownBlog\Http\Controllers;

use App\Http\Controllers\Controller;
use DanielWinning\StaticMarkdownBlog\StaticMarkdownBlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticMarkdownBlogController extends Controller
{
    public function index()
    {
        $posts = StaticMarkdownBlog::getPosts();

        return view("static-markdown-blog::posts.index", [
            "posts" => $posts
        ]);
    }

    public function show(string $slug): View|Factory|Application
    {
        $post = StaticMarkdownBlog::getPost($slug);

        if (is_null($post)) {
            return abort(404);
        } else {
            return view("static-markdown-blog::posts.show", ["post" => $post]);
        }
    }
}
