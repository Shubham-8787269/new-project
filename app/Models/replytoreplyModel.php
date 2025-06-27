<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replytoreplyModel extends Model
{
    use HasFactory;
    protected $table ='replytoreply';
     public $timestamps = true;
     protected $fillable = [
        'content',
        'comment_id',
        'post_id',
        'reply_id',
        'user_id',
    ];

     public function reply()
    {
        return $this->belongsTo(replyModel::class, 'reply_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
