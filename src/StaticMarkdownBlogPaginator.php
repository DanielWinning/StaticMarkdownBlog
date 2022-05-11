<?php

namespace DanielWinning\StaticMarkdownBlog;

class StaticMarkdownBlogPaginator
{
    public array $posts;
    protected array $pages;
    public int $pageCount;
    public int $currentPage;
    public int $perPage;

    public function __construct(array $posts, array $options = [])
    {
        $this->posts = $posts;
        $this->perPage = $options["perPage"] ?? 10;
        $this->pages = $this->buildPages($this->perPage);
        $this->pageCount = count($this->pages);
        $this->currentPage = $options["currentPage"] ?? 1;
        if (!$this->pageCount) {
            $this->currentPage = 0;
        }
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

    public function hasMorePages(): bool
    {
        return $this->pageCount > 1;
    }
}
