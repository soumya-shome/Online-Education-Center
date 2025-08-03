<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $primaryKey = 'e_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'e_id',
        'e_date',
        'e_slot',
        'st_id',
        'c_id',
        'p_type',
        'p_set',
        'activation_code',
        'status',
        'created_by',
    ];

    /**
     * Get the student taking this exam.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'st_id', 's_id');
    }

    /**
     * Get the course for this exam.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'c_id', 'c_id');
    }

    /**
     * Get the paper set for this exam.
     */
    public function paperSet()
    {
        return $this->belongsTo(PaperSet::class, 'p_set', 'p_id');
    }

    /**
     * Get the result for this exam.
     */
    public function result()
    {
        return $this->hasOne(Result::class, 'e_id', 'e_id');
    }

    /**
     * Get the admin who created this exam.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'a_id');
    }

    /**
     * Check if exam is online.
     */
    public function isOnline()
    {
        return $this->p_type === 'ONLINE';
    }

    /**
     * Check if exam is offline.
     */
    public function isOffline()
    {
        return $this->p_type === 'OFFLINE';
    }

    /**
     * Check if exam is completed.
     */
    public function isCompleted()
    {
        return $this->status === 'COMPLETE';
    }

    /**
     * Check if exam is pending.
     */
    public function isPending()
    {
        return $this->status === 'PENDING';
    }
} 