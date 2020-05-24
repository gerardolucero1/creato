<?php

namespace App;

use App\AdminList;
use Illuminate\Database\Eloquent\Model;

class AdminTask extends Model
{
    protected $guarded = [];

    public function list()
    {
        return $this->belongsTo(AdminList::class, 'admin_list');
    }
}
