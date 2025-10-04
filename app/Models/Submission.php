<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'problem_id',
        'submitted_flag',
        'correct',
        'awarded',
    ];

    /**
     * Relasi ke user yang melakukan submit.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke problem yang dikerjakan.
     */
    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
