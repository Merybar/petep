<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Log;
class Medication extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function log()
    {
        return $this->hasMany(Log::class);
    }
}
