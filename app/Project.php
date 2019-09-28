<?php

namespace App;

use App\User;
use App\GuestList;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'slug',
        'place',
        'date',
        'banner',
        'plans',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function list()
    {
        return $this->hasOne(GuestList::class);
    }
}
