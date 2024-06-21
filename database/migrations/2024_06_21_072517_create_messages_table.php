<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_room_id');
            $table->unsignedBigInteger('chat_member_id');
            $table->string('message');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['chat_member_id', 'chat_room_id']);
            $table->foreign('chat_room_id')->references('id')->on('chat_rooms');
            $table->foreign('chat_member_id')->references('id')->on('chat_members');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
