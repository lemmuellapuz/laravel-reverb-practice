<?php

namespace App\Http\Controllers\Chat\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\Message\SendMessageRequest;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    
    public function __invoke(ChatRoom $chatRoom, SendMessageRequest $request)
    {
        
    }
}
