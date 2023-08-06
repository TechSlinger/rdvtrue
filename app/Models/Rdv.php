<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'user_id',
        'medecin_id',
        'confirmed',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
    ];

    // Define the relationship with the User model (assuming the appointment belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Doctor model (assuming the appointment belongs to a doctor)
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
