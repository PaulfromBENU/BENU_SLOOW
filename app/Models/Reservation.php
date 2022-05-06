<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql_sloow';

    public function opening()
    {
        return $this->belongsTo(Opening::class);
    }
}
