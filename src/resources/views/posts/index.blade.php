<div class="smb-post-index">
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

    @if(config("static-markdown-blog.indexPagination") && isset($paginator))
        @include("static-markdown-blog::posts.paginator", ["paginator" => $paginator])
    @endif
</div>
