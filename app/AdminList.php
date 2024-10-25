<?php

namespace App;

use App\Project;
use App\AdminTask;
use Illuminate\Database\Eloquent\Model;

class AdminList extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(AdminTask::class, 'admin_list');
    }
}
