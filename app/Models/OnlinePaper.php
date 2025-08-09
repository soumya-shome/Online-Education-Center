<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePaper extends Model
{
    use HasFactory;

    protected $table = 'p_on';

    protected $primaryKey = 'p_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'p_id',
        'c_id',
        'time',
        'no_of_q',
        'ne_marks',
        'tot_marks',
        'p_q_marks',
    ];

    public $timestamps = false;

    /**
     * Get the paper set for this online paper.
     */
    public function paperSet()
    {
        return $this->belongsTo(PaperSet::class, 'p_id', 'p_id');
    }
} 