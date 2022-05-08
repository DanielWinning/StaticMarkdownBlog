<?php

namespace DanielWinning\StaticMarkdownBlog;

use Carbon\Carbon;

class StaticMarkdownBlogPost
{
    public string $title;
    public string $slug;
    public Carbon|string $published_at;

    public function __construct(array $data)
    {
        $this->title = $data["title"];
        $this->slug = config("static-markdown-blog.postsUrl") . "/" . $data["slug"];
        $this->published_at = new Carbon($data["published_at"]);
        $this->published_at = $this->published_at->format(config("static-markdown-blog.dateFormat"));

        foreach ($data as $key => $value) {
            if (!in_array($key, ["title", "slug", "published_at"])) {
                $this->{$key} = $value;
            }
        }
    }
}
