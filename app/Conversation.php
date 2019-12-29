<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Conversation extends Model
{
    protected $appends = ['contact_name'];
    //obtener imagen
    public function getContactImageAttribute($key)
    {
        return 'users'.$this->contact()->first(['photo'])->profile->photo;
    }
    // Definicion de un asesor
    public function getContactNameAttribute($key)
    {
        return $this->contact()->first(['name'])->name;
    }
    public function contact()
    {
        // N Conversation    1 User (Contact)
        return $this->belongsTo(User::class);
    }
}