<?php

namespace App;

use App\User;
use App\AdminList;
use App\GuestList;
use App\NumberTable;
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

    public function adminList()
    {
        return $this->hasMany(AdminList::class, 'project_id');
    }

    public function tables()
    {
        return $this->hasMany(NumberTable::class);
    }
}
