<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'c_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'c_id',
        'name',
        'duration',
        'description',
        'file',
        'created_by',
    ];

    /**
     * Get the students enrolled in this course.
     */
    public function students()
    {
        return $this->hasMany(StudentCourse::class, 'c_id', 'c_id');
    }

    /**
     * Get the exams for this course.
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, 'c_id', 'c_id');
    }

    /**
     * Get the paper sets for this course.
     */
    public function paperSets()
    {
        return $this->hasMany(PaperSet::class, 'c_id', 'c_id');
    }

    /**
     * Get the admin who created this course.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'a_id');
    }

    /**
     * Get the file path for the course material.
     */
    public function getFilePathAttribute()
    {
        return $this->file ? 'storage/courses/' . $this->file : null;
    }
} 