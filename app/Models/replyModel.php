<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replyModel extends Model
{
    use HasFactory;
    protected $table = 'reply';
     protected $fillable = [
        'content',
        'comment_id',
        'post_id',
        'user_id',
    ];

    public function comment()
{
    return $this->belongsTo(Comment::class);
}

public function post()
{
    return $this->belongsTo(Post::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
 public function replyToReplies()
    {
        return $this->hasMany(replytoreplyModel::class, 'reply_id');
    }
}
