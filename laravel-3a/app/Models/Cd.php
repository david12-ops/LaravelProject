<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    protected $fillable = ['name', 'auth_id', 'year',  'genre_id'];
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class, 'auth_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
