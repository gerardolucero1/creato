<?php

namespace App;

use App\AdminTask;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(AdminTask::class, 'adminTask_id');
    }
}
