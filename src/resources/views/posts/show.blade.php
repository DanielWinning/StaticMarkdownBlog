<div class="smb-post">
    <h1 class="smb-post-title">
        {{ $post->title }}
    </h1>

    <span class="smb-post-date">
        {{ $post->published_at }}
    </span>

    <div class="smb-post-content">
        {!! $post->content !!}
    </div>
</div>
