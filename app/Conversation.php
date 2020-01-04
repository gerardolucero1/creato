<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Conversation extends Model
{

    protected $appends = ['contact_name', 'profile_photo'];
    
    // Definicion de un asesor
    public function getContactNameAttribute($key)
    {
        return $this->contact()->first(['name'])->name;
    }
    // obtener imagen
    public function getProfilePhotoAttribute($key)
    {
        return $this->user()->profile()->first(['photo'])->photo;
    }
    public function contact()
    {
        // N Conversation    1 User (Contact)
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        // N Conversation    1 User (Contact)
                return $this->belongsToThrough(User::class, Profile::class);
    }
    
}