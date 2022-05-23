<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [\DanielWinning\StaticMarkdownBlog\Http\Controllers\StaticMarkdownBlogController::class, "index"]);
Route::get("/{slug}", [\DanielWinning\StaticMarkdownBlog\Http\Controllers\StaticMarkdownBlogController::class, "show"]);
