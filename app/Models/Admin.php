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
        return $this->belongsTo(User::class, 'a_id', 'st_id');
    }

    /**
     * Get the courses created by the admin.
     */
    public function courses()
    {
        // Since there's no created_by column, we'll return empty collection
        return collect();
    }

    /**
     * Get the exams created by the admin.
     */
    public function exams()
    {
        // Since there's no created_by column, we'll return empty collection
        return collect();
    }

    public $timestamps = false;
} 