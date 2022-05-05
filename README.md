# Static Markdown Blog

**A Laravel package for generating static blog posts from Markdown files.**

Sometimes, you want a blog but don't necessarily want to create a CMS to manage your posts. This is where Markdown comes 
in. Write your posts in Markdown, directly inside your project, and they'll be served up as static HTML.

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
