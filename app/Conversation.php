<?php
namespace App;
use App\User;
use App\Profile;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{ 
    protected $appends = ['contact_name', 'photo'];
    // Definicion de un asesor
    public function getContactNameAttribute($key)
    {
        return $this->contact()->first(['name'])->name;
    }

    public function getPhotoAttribute($key)
    {
        $profile = Profile::where('user_id', $this->contact_id)->get();
        return $profile;
    }
    
    public function contact()
    {
        return $this->belongsTo(User::class);
    }

}