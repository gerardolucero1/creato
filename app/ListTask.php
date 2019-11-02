<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTask extends Model
{
    protected $fillable = [
        'blockList_id','name','slug'
    ];
    public function task(){
       
        return $this->hasMany(Task::class, 'task_id');

}

public function block_list(){
       
    return $this->belongsTo(BlockList::class, 'blockList_id');

}

}
