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
        [
            "title" => "My First Post",
            "slug" => "my-first-post",
            "published_at" => "2020-01-01"
        ],
        [
            "title" => "My Second Post",
            "slug" => "my-second-post",
            "published_at" => "2020-01-02"
        ],
        [
            "title" => "My Third Post",
            "slug" => "my-third-post",
            "published_at" => "2020-01-03"
        ],
        [
            "title" => "My Fourth Post",
            "slug" => "my-fourth-post",
            "published_at" => "2020-01-04"
        ],
        [
            "title" => "My Fifth Post",
            "slug" => "my-fifth-post",
            "published_at" => "2020-01-05"
        ],
        [
            "title" => "My Sixth Post",
            "slug" => "my-sixth-post",
            "published_at" => "2020-01-06"
        ],
        [
            "title" => "My Seventh Post",
            "slug" => "my-seventh-post",
            "published_at" => "2020-01-07"
        ],
        [
            "title" => "My Eighth Post",
            "slug" => "my-eighth-post",
            "published_at" => "2020-01-08"
        ],
        [
            "title" => "My Ninth Post",
            "slug" => "my-ninth-post",
            "published_at" => "2020-01-09"
        ]
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
    "sortByIsDate" => true,
    "sortOrder" => "desc"
];
