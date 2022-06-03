<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Breed;
use \App\Models\Owner;

class Animal extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

}
