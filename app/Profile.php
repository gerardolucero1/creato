<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
  protected $fillable = [
        'last_name', 'second_name', 'photo', 'banner', 'description', 'phone', 'user_id'
    ];

     public function user()
 {
 return $this->belongsTo(User::class);
 }

       
}
