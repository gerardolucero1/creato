<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    
  protected $fillable = [
    'dashboard', 'welcome', 'tables', 'index', 'nosotros1', 'nosotros2', 'nosotros3', 'nosotros4', 'contact', 'otro','color'
];

public function user() 
{
return $this->belongsTo(User::class);
}

}
