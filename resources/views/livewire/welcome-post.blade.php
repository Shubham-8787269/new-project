<div wire:poll.4s>
    <div class="read-area">
        <h2>PostHub</h2>

        @foreach($posts as $post)
        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-primary">{{ $post->title }}</h4>
                <p class="text-muted">{{ $post->content }}</p>

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid rounded mb-3" style="max-width: 50%; height: auto;">
                @endif

                <h5 class="mt-4 text-secondary border-bottom pb-2">💬 Comments</h5>

                <div class="comment-box-scroll" style="max-height: 400px; overflow-y: auto; padding-right: 10px;">
                    @foreach($post->comments as $comment)
                    <div class="bg-light p-3 rounded shadow-sm mb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong class="text-dark">{{ $comment->user->name ?? 'Anonymous' }}</strong>
                                <p class="mb-1">{{ $comment->content }}</p>
                            </div>

                            @auth
                                @if(auth()->id() !== $comment->user_id)
                                    <div x-data="{ openReply: false }">
                                        <button @click="openReply = !openReply" class="btn btn-sm btn-outline-warning">↪ Reply</button>

                                        <form x-show="openReply" x-transition class="mt-2" method="POST" action="{{ url('/store/reply') }}">
                                            @csrf
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <textarea name="content" rows="2" class="form-control mb-2" placeholder="Write your reply..."></textarea>
                                            <button type="submit" class="btn btn-sm btn-success">Post Reply</button>
                                            <button type="button" @click="openReply = false" class="btn btn-sm btn-outline-secondary">Cancel</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>

                        @foreach($comment->replies as $reply)
                        <div class="ms-4 mt-3 bg-white border-start border-4 border-warning p-3 rounded">
                            <strong class="text-success">{{ $reply->user->name ?? 'Anonymous' }}</strong>
                            <p class="mb-0">{{ $reply->content }}</p>

                            @if($reply->replyToReplies && $reply->replyToReplies->count())
                                @foreach($reply->replyToReplies as $nestedReply)
                                <div class="ms-4 mt-2 bg-light border-start border-4 border-success p-2 rounded">
                                    <strong class="text-info">{{ $nestedReply->user->name ?? 'Anonymous' }}</strong>
                                    <p class="mb-1">{{ $nestedReply->content }}</p>
                                </div>
                                @endforeach
                            @endif

                            @auth
                                @if(auth()->id() !== $reply->user_id)
                                    <div x-data="{ openReply: false }">
                                        <button @click="openReply = !openReply" class="btn btn-sm btn-outline-warning mt-2">↪ Reply</button>

                                        <form x-show="openReply" x-transition class="mt-2" method="POST" action="{{ url('/store/replytoreply') }}">
                                            @csrf
                                            <input type="hidden" name="comment_id" value="{{ $reply->comment_id }}">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                                            <textarea name="content" rows="2" class="form-control mb-2" placeholder="Write your reply..."></textarea>
                                            <button type="submit" class="btn btn-sm btn-success">Post Reply</button>
                                            <button type="button" @click="openReply = false" class="btn btn-sm btn-outline-secondary">Cancel</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                {{-- Add New Comment --}}
                <form class="comment-form mt-4" method="POST" action="{{url('/store/comment/'.$post->id)}}">
                    @csrf
                    <h4 class="mb-3">Leave a Comment</h4>
                    @auth
                        <p><strong>{{ auth()->user()->name }}:</strong></p>
                        <textarea name="content" rows="4" class="form-control" placeholder="Your thoughts..." required></textarea>
                        <button type="submit" class="btn btn-success mt-3">Post Comment</button>
                    @else
                        <textarea rows="4" class="form-control" placeholder="Please login to comment..." disabled></textarea>
                        <a href="{{ url('/login') }}" class="btn btn-danger mt-3">🔐 Login to Comment</a>
                    @endauth
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- ✅ Include Alpine.js --}}
<script src="//unpkg.com/alpinejs" defer></script>
