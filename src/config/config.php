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
            "title" => "My first blog post",
            "slug" => "my-first-blog-post",
            "published_at" => "2018-01-01",
        ]
    ],

    /**
     * Format for date conversions
     */
    "dateFormat" => "jS F, Y"
];
