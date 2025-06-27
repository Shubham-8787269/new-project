<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class WelcomePost extends Component
{
    public function render()
    {
         $posts = Post::with([
    'comments.user',
    'comments.replies.user',
    'comments.replies.replyToReplies.user' // 👈 important for reply-to-reply
])->latest()->get();
        return view('livewire.welcome-post',compact('posts'));
    }
}
