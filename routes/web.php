<?php

use App\Http\Controllers\Chat\Message\SendMessageController;
use App\Http\Controllers\ProfileController;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    $recipient = User::whereNot('id', Auth::user()->id)->first();
    
    $chatroom = ChatRoom::with(['memberInfo' => function($q){
        $q->whereNot('users.id', Auth::user()->id);
    }])->first();

    $memberCounts = count($chatroom->memberInfo);
    if($memberCounts > 2)
    {
        $memberCounts = $memberCounts - 2;
        $members = $chatroom->memberInfo[0] . ', ' . $chatroom->memberInfo[1] . ", and {$memberCounts} others";
    }
    else{
        $members = implode(', ', $chatroom->memberInfo->pluck('name')->toArray());
    }
    
    return view('dashboard', [
        'recipient' => $recipient, 
        'user' => Auth::user(),
        'chat_room' => $chatroom,
        'members' => $members,
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/chat/{chatRoom}/message/send', SendMessageController::class)->name('message.send');
});

require __DIR__.'/auth.php';
