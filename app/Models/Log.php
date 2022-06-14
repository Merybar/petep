<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use App\Models\Medication;

class Log extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function medication()
    {
        return $this->belongsToMany(Medication::class);
    }
}
