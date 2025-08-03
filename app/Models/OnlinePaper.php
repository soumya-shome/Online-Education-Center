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
        'time',
        'total_questions',
        'passing_marks',
    ];

    /**
     * Get the paper set for this online paper.
     */
    public function paperSet()
    {
        return $this->belongsTo(PaperSet::class, 'p_id', 'p_id');
    }
} 