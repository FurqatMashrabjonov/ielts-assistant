<?php

namespace App\Models;

use App\Enums\SpeakingCategoryFromType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpeakingCategory extends Model
{

    protected $fillable = [
        'user_id',
        'confirmed_by',
        'chat_id',
        'title',
        'from_date',
        'to_date',
        'status',
        'from'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
