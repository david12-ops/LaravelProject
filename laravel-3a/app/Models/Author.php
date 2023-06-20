<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'surname'];
    use HasFactory;

    public function cds()
    {
        return $this->hasMany(Cd::class);
    }
}
