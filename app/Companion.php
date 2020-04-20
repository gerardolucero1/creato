<?php

namespace App;

use App\Guest;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    protected $fillable = [
        'guest_id',
        'name',
        'lastName',
        'secondLastName',
        'genere',
        'email',
        'phone',
        'dataX',
        'dataY',
        'seated',
        'status',
        'table',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
