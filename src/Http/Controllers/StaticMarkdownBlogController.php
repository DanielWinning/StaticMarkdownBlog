<?php

namespace DanielWinning\StaticMarkdownBlog\Http\Controllers;

use App\Http\Controllers\Controller;
use DanielWinning\StaticMarkdownBlog\StaticMarkdownBlog;

class StaticMarkdownBlogController extends Controller
{
    public function index()
    {
        dd(StaticMarkdownBlog::getPosts());
    }
}
