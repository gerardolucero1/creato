<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class NumberTable extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
