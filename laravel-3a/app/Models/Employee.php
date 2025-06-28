<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'surname',  'room_id',  'job',   'wage'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
