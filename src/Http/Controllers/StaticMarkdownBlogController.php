<?php

namespace DanielWinning\StaticMarkdownBlog\Http\Controllers;

use App\Http\Controllers\Controller;

class StaticMarkdownBlogController extends Controller
{
    public function index()
    {
        return "Hello, blog!";
    }
}
