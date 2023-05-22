<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class From extends Model
{
    use HasFactory;
    protected $fillable = [
      'chat_id',
      'user'
    ];

    protected $casts = [
      'user' => 'array'
    ];
}
