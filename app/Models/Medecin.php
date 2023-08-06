<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{   
    protected $fillable=['name' ,'description' ,'speciality', 'city', 'image', 'phonenumber', 
    'adresse', ];

    public function rdvs()
{
    return $this->hasMany(Rdv::class);
}

}
