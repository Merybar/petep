<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medication;
class Log extends Model
{
    use HasFactory;

    public function medication()
    {
        return $this->BelongsToMany(Medication::class);
    }
}
