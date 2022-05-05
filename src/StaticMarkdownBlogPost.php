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
        $this->published_at = new \Carbon\Carbon($data["published_at"]);
        $this->published_at = $this->published_at->format(config("static-markdown-blog.dateFormat"));
    }
}
