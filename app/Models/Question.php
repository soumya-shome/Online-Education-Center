<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'p_id',
        'q_no',
        'ques',
        'op1',
        'op2',
        'op3',
        'op4',
        'c_opt',
    ];

    public $timestamps = false;

    /**
     * Get the paper set for this question.
     */
    public function paperSet()
    {
        return $this->belongsTo(PaperSet::class, 'p_id', 'p_id');
    }

    /**
     * Check if the given answer is correct.
     */
    public function isCorrectAnswer($answer)
    {
        return $answer == $this->c_opt;
    }

    /**
     * Get the options as an array.
     */
    public function getOptionsAttribute()
    {
        return [
            '1' => $this->op1,
            '2' => $this->op2,
            '3' => $this->op3,
            '4' => $this->op4,
        ];
    }

    /**
     * Get the question text.
     */
    public function getQuestionAttribute()
    {
        return $this->ques;
    }

    /**
     * Get the marks for this question.
     */
    public function getMarksAttribute()
    {
        // Default marks since there's no marks column in the database
        return 1;
    }
} 