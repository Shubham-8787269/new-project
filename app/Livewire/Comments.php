<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $post;
    public $parentId = null;
    public $depth = 1;
    public $content;

    public function mount(Post $post, $parentId = null, $depth = 1)
    {
        $this->post = $post;
        $this->parentId = $parentId;
        $this->depth = $depth;
    }

    public function addComment()
    {
        $this->validate(['content' => 'required|string']);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $this->post->id,
            'parent_comment_id' => $this->parentId,
            'depth' => $this->depth,
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function render()
    {
        $comments = $this->post->comments()->with('replies')->get();
        return view('livewire.comments', compact('comments'));
    }
}


