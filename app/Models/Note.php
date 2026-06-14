<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The table associated with the model.
#[Table('notes')]

// The attributes that are mass assignable.
#[Fillable([
    'user_id',
    'title',
    'content',
    'is_pinned',
])]

class Note extends Model
{
    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        // Relations One To Many / Satu Ke Banyak model user
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsToMany<Tag, $this>
     */
    public function tags(): BelongsToMany
    {
        // Relations Many To Many / Banyak Ke Banyak model tag
        return $this->belongsToMany(Tag::class);
    }
}
