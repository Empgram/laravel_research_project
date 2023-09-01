<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $primaryKey = 'student_lrn';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_lrn',
        'student_name',
        'address',
        'contact',
        'section',
        'grade',
        'age',
        'guardian_name',
        'guardian_phone',
        'guardian_email',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Listen for the "creating" event to automatically fill student_name based on student_lrn
        static::creating(function ($student) {
            if (empty($student->student_name)) {
                $studentDetails = static::where('student_lrn', $student->student_lrn)->first();
                if ($studentDetails) {
                    $student->student_name = $studentDetails->student_name;
                }
            }
        });
    }
}
