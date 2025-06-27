<div class="ms-{{ $comment->depth * 4 }} mb-2 border-start ps-3">
    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>

    @auth
    @if($comment->canReply())
        @livewire('comments', ['post' => $comment->post, 'parentId' => $comment->id, 'depth' => $comment->depth + 1], key($comment->id))
    @endif
    @endauth

    @foreach($comment->replies as $reply)
        @include('components.comment', ['comment' => $reply])
    @endforeach
</div>
