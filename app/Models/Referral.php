<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'studentlrn',
        'form_id',
        'reason',
        'state',
        'referral_date',
    ];

    // Define any relationships or methods related to the Referral model here
}
