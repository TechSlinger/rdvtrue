<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Medecin extends Authenticatable
{   
    protected $fillable=['name' ,'description' ,'speciality', 'city', 'image', 'phonenumber', 
    'adresse', 'email','user_id','password',];

    public function rdvs()
    {
        return $this->hasMany(Rdv::class);
    }
    


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
