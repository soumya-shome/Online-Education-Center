<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperSet extends Model
{
    use HasFactory;

    protected $primaryKey = 'p_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'p_id',
        'c_id',
        'type',
        'status',
    ];

    public $timestamps = false;

    /**
     * Get the course for this paper set.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'c_id', 'c_id');
    }

    /**
     * Get the questions for this paper set.
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'p_id', 'p_id');
    }

    /**
     * Get the exams using this paper set.
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, 'p_set', 'p_id');
    }

    /**
     * Get the online paper details.
     */
    public function onlinePaper()
    {
        return $this->hasOne(OnlinePaper::class, 'p_id', 'p_id');
    }

    /**
     * Get the offline paper details.
     */
    public function offlinePaper()
    {
        return $this->hasOne(OfflinePaper::class, 'p_id', 'p_id');
    }

    /**
     * Get the admin who created this paper set.
     */
    public function admin()
    {
        // Since there's no created_by column, we'll return null for now
        return null;
    }

    /**
     * Check if paper set is online.
     */
    public function isOnline()
    {
        return $this->type === 'ONLINE';
    }

    /**
     * Check if paper set is offline.
     */
    public function isOffline()
    {
        return $this->type === 'OFFLINE';
    }
} 