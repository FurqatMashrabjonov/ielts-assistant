<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cambridge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pdf_path',
        'audio_path'
    ];

    public $timestamps = false;
}
