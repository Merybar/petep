<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Log extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
