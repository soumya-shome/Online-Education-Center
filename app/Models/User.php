<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'profile';
    protected $primaryKey = 'st_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'st_id',
        'password',
        'type',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the student profile associated with the user.
     */
    public function student()
    {
        return $this->hasOne(Student::class, 's_id', 'st_id');
    }

    /**
     * Get the admin profile associated with the user.
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'a_id', 'st_id');
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->type === 'ADMIN';
    }

    /**
     * Check if user is student
     */
    public function isStudent()
    {
        return $this->type === 'STUDENT';
    }

    /**
     * Get the name for the user
     */
    public function getNameAttribute()
    {
        if ($this->isStudent()) {
            return $this->student ? $this->student->f_name . ' ' . $this->student->l_name : $this->st_id;
        } elseif ($this->isAdmin()) {
            return $this->admin ? $this->admin->name : $this->st_id;
        }
        return $this->st_id;
    }
} 