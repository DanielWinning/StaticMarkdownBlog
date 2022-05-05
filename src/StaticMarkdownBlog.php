<?php

namespace DanielWinning\StaticMarkdownBlog;

class StaticMarkdownBlog
{
    public static function getPosts(?int $limit = null): array
    {
        $rawPosts = config("static-markdown-blog.posts");
        $posts = [];

        foreach ($rawPosts as $post) {
            $posts[] = new StaticMarkdownBlogPost($post);
        }

        return $posts;
    }

    public static function getPost(string $slug)
    {

    }

    private static function postExists(string $slug)
    {

    }
}
