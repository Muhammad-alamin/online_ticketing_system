<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function section(){
        return $this->hasMany(Section::class,'event_id');
    }
    public function block(){
        return $this->hasMany(Block::class,'event_id');
    }
}
