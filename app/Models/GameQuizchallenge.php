<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameQuizchallenge extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'classroom',
        'suggestion_one',
        'suggestion_two',
        'suggestion_three',
        'suggestion_four',
    ];
    
    


}