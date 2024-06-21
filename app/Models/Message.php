<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function chatMember()
    {
        return $this->belongsTo(ChatMember::class, 'chat_member_id', 'id');
    }

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id', 'id');
    }
}
