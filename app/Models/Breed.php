<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Animal;

class Breed extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function animal()
    {
        return $this->hasMany(Animal::class);
    }
}

