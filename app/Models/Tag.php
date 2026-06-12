<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

// The table associated with the model.
#[Table('tags')]

// The attributes that are mass assignable.
#[Fillable([
    'name'
])]

class Tag extends Model
{
    public function notes()
    {
        // Relations Many To Many / Banyak Ke Banyak model note
        return $this->belongsToMany(Note::class);
    }
}
