<?php

Route::get("/", [\DanielWinning\StaticMarkdownBlog\Http\Controllers\StaticMarkdownBlogController::class, "index"]);
Route::get("/{slug}", [\DanielWinning\StaticMarkdownBlog\Http\Controllers\StaticMarkdownBlogController::class, "show"]);
