<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chat extends TelegraphChat
{

    protected $table = 'telegraph_chats';

    public function from(): HasOne|Chat
    {
        return $this->hasOne(From::class, 'chat_id', 'chat_id');
    }


}
