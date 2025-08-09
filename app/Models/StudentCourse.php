<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $table = 'st_course';

    protected $fillable = [
        'st_id',
        'c_id',
        'd_o_c',
        'status',
    ];

    public $timestamps = false;

    /**
     * Get the student for this enrollment.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'st_id', 's_id');
    }

    /**
     * Get the course for this enrollment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'c_id', 'c_id');
    }

    /**
     * Check if enrollment is active.
     */
    public function isActive()
    {
        return $this->status === 'EXAM';
    }

    /**
     * Check if enrollment is completed.
     */
    public function isCompleted()
    {
        return $this->status === 'COMPLETED';
    }
} 