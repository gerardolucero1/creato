<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ListTask;

class Task extends Model
{
    protected $fillable = [
        'listTask_id', 'name', 'slug','category','complete'
    ];

    public function list_task(){
       
            return $this->belongsTo(ListTask::class, 'listTask_id');

    }
}
