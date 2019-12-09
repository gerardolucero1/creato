<?php

namespace App;

use App\Companion;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'guestList_id',
        'name',
        'lastName',
        'secondLastName',
        'genere',
        'email',
        'phone',
        'guests',
        'dataX',
        'dataY',
        'seated',
        'status',
        'origin',
        'table',
    ];

    public function guestList()
    {
        return $this->belongsTo(GuestList::class);
    }

    public function companions()
    {
        return $this->hasMany(Companion::class);
    }
}
