<?php

namespace App;

use App\Guest;
use App\Project;
use App\Companion;
use Illuminate\Database\Eloquent\Model;

class NumberTable extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class, 'tableName');
    }

    public function companions()
    {
        return $this->hasMany(Companion::class, 'tableName');
    }
}
