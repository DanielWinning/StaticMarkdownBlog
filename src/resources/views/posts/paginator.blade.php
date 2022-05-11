@if($paginator->pageCount)
    <div class="smb-pagination-links">
        <div class="smb-pagination-links-counters">
            {{ $paginator->currentPage }} / {{ $paginator->pageCount }}
        </div>
        <div class="smb-pagination-per-page">
            Displaying {{ $paginator->perPage }} results per page
        </div>
        <div class="smb-pagination-links-buttons">
            @if($paginator->currentPage > 1)
                <a href="{{ config("static-markdown-blog.postsUrl") . "?page=" . $paginator->currentPage - 1 }}"
                   class="smb-pagination-previous-link">
                    Previous
                </a>
            @endif
            @if($paginator->currentPage < $paginator->pageCount)
                <a href="{{ config("static-markdown-blog.postsUrl") . "?page=" . $paginator->currentPage + 1 }}"
                   class="smb-pagination-next-link">
                    Next
                </a>
            @endif
        </div>
    </div>
@endif
