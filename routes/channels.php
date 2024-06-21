<?php

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{chatRoom}', function ($user, ChatRoom $chatRoom) {
    if($chatRoom->members()->where('user_id', $user->id)->exists())
        return true;
});