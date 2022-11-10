<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Appointment
 * @package App\Models
 */
class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'room_number' => 'int'
    ];

    protected $dates = [
        'booked_at'
    ];

    /**
     * @return HasOne
     */
    public function doctor()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
