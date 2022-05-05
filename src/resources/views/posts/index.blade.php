<div class="smb-post-index">
    @foreach($posts as $post)
        <a class="smb-post-preview" href="{{ config("static-markdown-blog.postsUrl") . "/" . $post->slug }}">
            <h2>
                {{ $post->title }}
            </h2>
            <span>
                {{ $post->published_at }}
            </span>
        </a>
    @endforeach
</div>
