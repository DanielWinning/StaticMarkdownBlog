<div class="smb-post-index">
    @foreach($posts as $post)
        <div class="smb-post-preview">
            <h2>
                {{ $post->title }}
            </h2>
            <span>
                {{ $post->slug }}
            </span>
        </div>
    @endforeach
</div>
