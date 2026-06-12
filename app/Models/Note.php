<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

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
    public function user()
    {
        // Relations One To Many / Satu Ke Banyak model user
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        // Relations Many To Many / Banyak Ke Banyak model tag
        return $this->belongsToMany(Tag::class, 'note_id');
    }
}
