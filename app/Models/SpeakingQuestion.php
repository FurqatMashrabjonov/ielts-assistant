<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpeakingQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'user_id',
      'status',
      'speaking_category_id',
      'chat_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function speakingCategory(): BelongsTo
    {
        return $this->belongsTo(SpeakingCategory::class);
    }
}
