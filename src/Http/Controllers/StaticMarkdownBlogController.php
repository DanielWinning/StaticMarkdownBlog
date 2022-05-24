<?php

namespace DanielWinning\StaticMarkdownBlog\Http\Controllers;

use App\Http\Controllers\Controller;
use DanielWinning\StaticMarkdownBlog\StaticMarkdownBlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use League\CommonMark\CommonMarkConverter;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StaticMarkdownBlogController extends Controller
{
    public function index(): Factory|View|Application
    {
        if (config("static-markdown-blog.indexPagination")) {
            $paginator = StaticMarkdownBlog::getPaginatedPosts(config("static-markdown-blog.paginationLimit"));
            return view("static-markdown-blog::posts.index", [
                "posts" => $paginator->posts,
                "paginator" => $paginator
            ]);
        }

        return view("static-markdown-blog::posts.index", [
            "posts" => StaticMarkdownBlog::getPosts()
        ]);
    }

    public function show(string $slug)
    {
        $post = StaticMarkdownBlog::getPost($slug);

        if (is_null($post)) {
            return abort(404);
        } else {
            $explodedSlug = explode("/", $post->slug);
            $searchForSlug = end($explodedSlug);
            if (file_exists(config("static-markdown-blog.postsPath") . "/" . $searchForSlug . ".md")) {
                $post->content = file_get_contents(config("static-markdown-blog.postsPath") . "/" . $searchForSlug . ".md");
                $converter = new CommonMarkConverter([
                    "html_input" => "strip",
                    "allow_unsafe_links" => false
                ]);
                $post->content = $converter->convert($post->content);
            } else {
                return abort(404);
            }
            return view("static-markdown-blog::posts.show", [
                "post" => $post
            ]);
        }
    }
}
