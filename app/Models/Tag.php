<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The table associated with the model.
#[Table('tags')]

// The attributes that are mass assignable.
#[Fillable([
    'name'
])]

class Tag extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Note, $this>
     */
    public function notes(): BelongsToMany
    {
        // Relations Many To Many / Banyak Ke Banyak model note
        return $this->belongsToMany(Note::class);
    }
}
