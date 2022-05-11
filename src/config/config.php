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
