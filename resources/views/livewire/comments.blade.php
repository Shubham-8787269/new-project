<div>
    @auth
    <form wire:submit.prevent="addComment" class="mb-3">
        <textarea wire:model="content" class="form-control mb-2" placeholder="Write your comment..."></textarea>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> to comment.</p>
    @endauth

    @foreach($comments as $comment)
        @include('components.comment', ['comment' => $comment])
    @endforeach
</div>

