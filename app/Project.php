<?php

namespace App;

use App\User;
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
