<?php

namespace DanielWinning\StaticMarkdownBlog;

class StaticMarkdownBlogPaginator
{
    public array $posts;
    protected array $pages;
    public int $pageCount;
    public int $currentPage;

    public function __construct(array $posts, array $options = [])
    {
        $this->posts = $posts;
        $this->pages = $this->buildPages($options["perPage"] ?? 10);
        $this->pageCount = count($this->pages);
        $this->currentPage = $options["currentPage"] ?? 1;
        $this->posts = $this->getPostsForPage($this->currentPage);
    }

    private function buildPages(int $perPage): array
    {
        $paginatedPosts = [];

        foreach($this->posts as $post) {
            if (!count($paginatedPosts)) {
                $paginatedPosts[] = [$post];
            } else {
                $lastPage = end($paginatedPosts);

                if (count($lastPage) === $perPage) {
                    $paginatedPosts[] = [$post];
                } else {
                    $paginatedPosts[count($paginatedPosts) - 1][] = $post;
                }
            }
        }

        return $paginatedPosts;
    }

    private function getPostsForPage(int $page): array
    {
        return $this->pages[$page - 1] ?? [];
    }
}
