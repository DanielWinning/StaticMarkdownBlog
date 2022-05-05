<?php

namespace DanielWinning\StaticMarkdownBlog\Http\Controllers;

use App\Http\Controllers\Controller;
use DanielWinning\StaticMarkdownBlog\StaticMarkdownBlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use League\CommonMark\CommonMarkConverter;

class StaticMarkdownBlogController extends Controller
{
    public function index(): Factory|View|Application
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
            if (file_exists(config("static-markdown-blog.postsPath") . "/" . $post->slug . ".md")) {
                $post->content = file_get_contents(config("static-markdown-blog.postsPath") . "/" . $post->slug . ".md");
                $converter = new CommonMarkConverter([
                    "html_input" => "strip",
                    "allow_unsafe_links" => false
                ]);
                $post->content = $converter->convert($post->content);
            } else {
                return abort(404);
            }
            return view("static-markdown-blog::posts.show", ["post" => $post]);
        }
    }
}
