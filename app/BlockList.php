<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class BlockList extends Model
{
    protected $fillable = [
        'client_id', 'name'
    ];
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function lists_task()
        {
            return $this->hasMany(ListTask::class, 'listTask_id');
        }
    
}
