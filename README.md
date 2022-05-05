# Static Markdown Blog

**A Laravel package for generating static blog posts from Markdown files.**

Sometimes, you want a blog but don't necessarily want to create a CMS to manage your posts, or maybe you don't want to
add the overhead of a database. This is where Static Markdown Blog comes in. Write your posts in Markdown, directly 
inside your project, and they'll be served up as static HTML.

## Installation
```
composer require danielwinning/static-markdown-blog
```

Add the following to your service providers array inside `config/app.php`:
```
/*
 * Package Service Providers...
 */
\DanielWinning\StaticMarkdownBlog\StaticMarkdownBlogServiceProvider::class
```

Publish the config and views:
```
php artisan vendor:publish --provider="DanielWinning\StaticMarkdownBlog\StaticMarkdownBlogServiceProvider"
```

## Usage

After publishing the package files, note the empty `posts` array. This is where you'll store a *reference* to your posts, 
like so:

```
"posts" => [
    [
        "title" => "My First Blog Post with Laravel & Static Markdown Blog",
        "slug" => "my-first-blog-post-with-laravel-and-static-markdown-blog"
    ]
]
```

By default, the package will use `resources/posts` as the source of your posts. You can change this by publishing the
config file and changing the `postsPath` value. The package will expect your posts to be in Markdown format.

Your blog index will be served at `/blog` by default - posts will be served up at `/blog/{slug}` by default. You can change this by publishing the config file and
