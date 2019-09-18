<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $fillable = [
        'client_id',
        'order',
        'name',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

}
