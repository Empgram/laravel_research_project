<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class GuidanceReport extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'form_id';

    // Disable auto-increment
    public $incrementing = false;
    protected $fillable = [
        'form_id',
        'reason',
        'perpetrator_lrn',
        'perpetrator_name',
        'violation_type',
        'student_lrn',
        'student_name',
        'parent_contacted',
        'teacher_name',
        'date',
    ];
}
