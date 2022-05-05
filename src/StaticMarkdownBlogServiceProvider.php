<?php

namespace DanielWinning\StaticMarkdownBlog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class StaticMarkdownBlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . "/config/config.php", "static-markdown-blog");
        $this->publishes([
            __DIR__ . "/config/config.php" => config_path("static-markdown-blog.php"),
            __DIR__ . "/resources/views" => resource_path("views/vendor/static-markdown-blog")
        ]);
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__ . "/resources/views", "static-markdown-blog");
    }

    public function register()
    {

    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . "/routes/web.php");
        });
    }

    protected function routeConfiguration(): array
    {
        return [
            "prefix" => config("static-markdown-blog.postsUrl"),
            "namespace" => "DanielWinning\StaticMarkdownBlog\Http\Controllers",
        ];
    }
}
