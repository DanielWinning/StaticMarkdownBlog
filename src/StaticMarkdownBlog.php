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
        $posts = self::getPosts();

        foreach ($posts as $post) {
            if ($post->slug === $slug) {
                return $post;
            }
        }

        return null;
    }

    public static function postExists(string $slug): bool
    {
        return self::getPost($slug) !== null;
    }
}
