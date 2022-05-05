# Static Markdown Blog

A work in progress Laravel package.

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
