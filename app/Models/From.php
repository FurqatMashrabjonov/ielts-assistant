<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class From extends Model
{
    protected $fillable = [
      'chat_id',
      'user'
    ];

    protected $casts = [
      'user' => 'array',
    ];
}
