<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(ChatMember::class, 'chat_room_id', 'id');
    }

    public function memberInfo()
    {
        return $this->hasManyThrough(User::class, ChatMember::class, 'chat_room_id', 'id', 'id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_room_id', 'id');
    }
}
