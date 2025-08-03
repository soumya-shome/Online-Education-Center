<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'r_id',
        'e_id',
        'st_id',
        'marks_obtained',
        'total_marks',
        'percentage',
        'status',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    /**
     * Get the exam for this result.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'e_id', 'e_id');
    }

    /**
     * Get the student for this result.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'st_id', 's_id');
    }

    /**
     * Check if result is pass.
     */
    public function isPass()
    {
        return $this->status === 'PASS';
    }

    /**
     * Check if result is fail.
     */
    public function isFail()
    {
        return $this->status === 'FAIL';
    }

    /**
     * Get the grade based on percentage.
     */
    public function getGradeAttribute()
    {
        if ($this->percentage >= 90) return 'A+';
        if ($this->percentage >= 80) return 'A';
        if ($this->percentage >= 70) return 'B';
        if ($this->percentage >= 60) return 'C';
        if ($this->percentage >= 50) return 'D';
        return 'F';
    }
} 