<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Breed;
use \App\Models\Owner;
use \App\Models\Medication;
use \App\Models\Log;

class Animal extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function log()
    {
        return $this->hasMany(Log::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function medication()
    {
        return $this->belongsToMany(Medication::class);
    }

    
}

