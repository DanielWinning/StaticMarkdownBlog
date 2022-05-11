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

        if (config("static-markdown-blog.indexSorts") && config("static-markdown-blog.sortBy") === "published_at" && config("static-markdown-blog.sortOrder") === "desc") {
            $posts = self::sortPostsByLatest($posts);
        }

        return $posts;
    }

    public static function getPaginatedPosts(int $paginateBy = 10): StaticMarkdownBlogPaginator
    {
        return new StaticMarkdownBlogPaginator(self::getPosts(), [
            "perPage" => $paginateBy,
            "currentPage" => request()->has("page") ? request()->get("page") : 1
        ]);
    }

    public static function getPost(string $slug): mixed
    {
        $posts = self::getPosts();

        foreach ($posts as $post) {
            $explodedSlug = explode("/", $post->slug);
            $searchingForSlug = end($explodedSlug);
            if ($searchingForSlug === $slug) {
                return $post;
            }
        }

        return null;
    }

    private static function sortPostsByLatest(array $posts): array
    {
        usort($posts, function ($a, $b) {
            return strtotime($a->published_at) + strtotime($b->published_at);
        });
        return $posts;
    }
}
