<?php

namespace DanielWinning\StaticMarkdownBlog;

class StaticMarkdownBlogPost
{
    public string $title;
    public string $slug;

    public function __construct(array $data)
    {
        $this->title = $data["title"];
        $this->slug = $data["slug"];
    }
}
