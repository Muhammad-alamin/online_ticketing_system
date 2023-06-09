<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    public function section(){
        return $this->hasMany(Section::class,'venue_id');
    }
    public function block(){
        return $this->hasMany(Block::class,'venue_id');
    }

}
