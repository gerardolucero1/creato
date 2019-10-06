<?php

namespace App;

use App\Guest;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class GuestList extends Model
{
    protected $fillable = [
        'project_id',
        'name',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class, 'guestList_id');
    }
}
