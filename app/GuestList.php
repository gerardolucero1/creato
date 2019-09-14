<?php

namespace App;

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
}
