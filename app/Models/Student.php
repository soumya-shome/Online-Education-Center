<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 's_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        's_id',
        'f_name',
        'l_name',
        'gender',
        'email',
        'phone',
        'address',
    ];

    /**
     * Get the user associated with the student.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 's_id', 'email');
    }

    /**
     * Get the courses enrolled by the student.
     */
    public function courses()
    {
        return $this->hasMany(StudentCourse::class, 'st_id', 's_id');
    }

    /**
     * Get the exams taken by the student.
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, 'st_id', 's_id');
    }

    /**
     * Get the results of the student.
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'st_id', 's_id');
    }

    /**
     * Get the full name of the student.
     */
    public function getFullNameAttribute()
    {
        return $this->f_name . ' ' . $this->l_name;
    }
} 