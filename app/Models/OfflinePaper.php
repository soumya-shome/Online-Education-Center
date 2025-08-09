<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePaper extends Model
{
    use HasFactory;

    protected $table = 'p_off';

    protected $primaryKey = 'p_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'p_id',
        'c_id',
        'file',
        'tot_marks',
        'time',
    ];

    public $timestamps = false;

    /**
     * Get the paper set for this offline paper.
     */
    public function paperSet()
    {
        return $this->belongsTo(PaperSet::class, 'p_id', 'p_id');
    }

    /**
     * Get the file path for the offline paper.
     */
    public function getFilePathAttribute()
    {
        return $this->file ? 'storage/papers/' . $this->file : null;
    }
} 