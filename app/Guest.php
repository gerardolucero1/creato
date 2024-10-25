<?php

namespace App;

use App\Group;
use App\Companion;
use App\NumberTable;
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
        'groupName'
    ];

    public function guestList()
    {
        return $this->belongsTo(GuestList::class);
    }

    public function table()
    {
        return $this->belongsTo(NumberTable::class, 'tableName');
    }

    public function companions()
    {
        return $this->hasMany(Companion::class);
    }
}
