<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql_sloow';

    protected $guarded = [];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function valid_reservations()
    {
        return $this->hasMany(Reservation::class)->where('valid', '1');
    }
}
