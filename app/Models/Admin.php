<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'a_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'a_id',
        'name',
        'password',
    ];

    /**
     * Get the user associated with the admin.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'a_id', 'email');
    }

    /**
     * Get the courses created by the admin.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'created_by', 'a_id');
    }

    /**
     * Get the exams created by the admin.
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, 'created_by', 'a_id');
    }
} 