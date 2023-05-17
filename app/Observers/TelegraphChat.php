<?php

namespace App\Observers;

use App\Models\User;

class TelegraphChat
{
    public function creating(\DefStudio\Telegraph\Models\TelegraphChat $chat){
        User::query()->create([
            'name' => $chat->user
        ]);
    }
}
