<?php

return [
    /**
     * Package information
     */
    "name" => "Static Markdown Blog",
    "slug" => "static-markdown-blog",
    "version" => "1.0.0",

    /**
     * Where the markdown posts are stored
     */
    "postsPath" => base_path("resources/posts"),

    /**
     * The URL prefix for your applications blog posts
     */
    "postsUrl" => "/blog",

    /**
     * The blog posts
     */
    "posts" => [
        [
            "title" => "My third blog post",
            "slug" => "my-third-blog-post",
            "published_at" => "2022-05-07"
        ],
        [
            "title" => "My first blog post",
            "slug" => "my-first-blog-post",
            "published_at" => "2022-05-04"
        ],
        [
            "title" => "My second blog post",
            "slug" => "my-second-blog-post",
            "published_at" => "2022-05-06"
        ],
        // Add references to your posts here
    ],

    /**
     * Format for date conversions
     */
    "dateFormat" => "jS F, Y",

    /**
     * Sorting
     */
    "indexSorts" => true,
    "sortBy" => "published_at",
    "sortOrder" => "desc",

    /**
     * Pagination
     */
    "indexPagination" => true,
    "paginationLimit" => 4
];
