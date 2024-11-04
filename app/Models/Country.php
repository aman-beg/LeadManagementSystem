<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function state()
    {
        //for one-to-many relationship
        return $this->hasMany(State::class);
    }
}
