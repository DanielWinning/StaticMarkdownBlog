<div class="smb-post-index">
    <div class="smb-posts">
        @foreach($posts as $post)
            <a class="smb-post-preview" href="{{ $post->slug }}">
                <h2>
                    {{ $post->title }}
                </h2>
                <span>
                {{ $post->published_at }}
            </span>
            </a>
        @endforeach
    </div>

    @if(config("static-markdown-blog.indexPagination") && isset($paginator) && $paginator->hasMorePages())
        @include("static-markdown-blog::posts.paginator", ["paginator" => $paginator])
    @endif
</div>
