<?php

namespace App;

use App\Guest;
use App\NumberTable;
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

    public function table()
    {
        return $this->belongsTo(NumberTable::class, 'tableName');
    }
}
