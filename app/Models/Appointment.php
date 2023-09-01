<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'form_id',
        'student_name',
        'perpetrator_name',
        'reason',
        'appointment_date',
        'appointment_time',
    ];

    public function guidanceReport()
    {
        return $this->belongsTo(GuidanceReport::class, 'form_id', 'form_id');
    }
}
