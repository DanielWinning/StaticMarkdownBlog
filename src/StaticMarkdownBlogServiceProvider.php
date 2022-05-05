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
        ]);
        $this->registerRoutes();
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
