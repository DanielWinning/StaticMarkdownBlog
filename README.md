# Static Markdown Blog

**A Laravel package for generating static blog posts from Markdown files.**

Sometimes, you want a blog but don't necessarily want to create a CMS to manage your posts, or maybe you don't want to
add the overhead of a database. This is where Static Markdown Blog comes in. Write your posts in Markdown, directly 
inside your project, and they'll be served up as static HTML. Helps you to create a Markdown driven blog in minutes.

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

After publishing the package files, you will have a new config file at `config/static-markdown-blog.php`. Inside this 
config file, note the empty `posts` array. This is where you'll store a *reference* to your posts, like so:

```
"posts" => [
    [
        "title" => "My first blog post",
        "slug" => "my-first-blog-post",
        "published_at" => "2022-01-01"
    ]
]
```

By default, the package will use `resources/posts` as the source of your posts. You can change this by publishing the
config file and changing the `postsPath` value. The package will expect your posts to be in Markdown format. So the above
example would reference `resources/posts/my-first-blog-post.md`.

The only **required** fields are:

- **title**
- **slug**
- **published_at**

Your blog index will be served at `/blog` by default - posts will be served up at `/blog/{slug}` by default. You can 
change this by publishing the config file and updating the `postsUrl` value. Using the above example, your blog post
will be served at `/blog/my-first-blog-post`.

### Displaying Posts Elsewhere

To display posts on other pages outside of the blog index, simply get the posts and pass them to a view. Inside 
your controller or route definition use the `getPosts` method:

```
return view("app.index", [
    "posts" => \DanielWinning\StaticMarkdownBlog\StaticMarkdownBlog::getPosts($limit)
]);
```

Then displaying them on the frontend is as simple as looping through the posts and displaying them:
```
@foreach($posts as $post)
    <div class="post-preview" 
         onclick="window.location.href='{{ $post->slug }}'">
        <h2 class="post-title">
            {{ $post->title }}
        </h2>
        <span class="post-date">
            {{ $post->published_at }}
        </span>
    </div>
@endforeach
```

## Pagination

As of version 1.1, the package now supports pagination, which is enabled by default. To use the pagination features in 
your own views, you can create a new paginator and pass it to a view:

```
$paginator = \DanielWinning\StaticMarkdownBlog\StaticMarkdownBlog::getPaginatedPosts($limit);

return view("app.index", [
    "posts => $paginator->posts,
    "paginator" => $paginator
]);
```

In your view, you can then display the posts and the pagination links:
```
<div class="posts">
    @foreach($posts as $post)
        <div class="post-preview" 
             onclick="window.location.href='{{ $post->slug }}'">
            <h2 class="post-title">
                {{ $post->title }}
            </h2>
            <span class="post-date">
                {{ $post->published_at }}
            </span>
        </div>
    @endforeach
</div>

@if(config("static-markdown-blog.indexPagination") && isset($paginator) && $paginator->hasMorePages())
    @include("static-markdown-blog::posts.paginator", ["paginator" => $paginator])
@endif
```
