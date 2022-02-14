<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class legealCheckerTermOffense extends Model
{
    use HasFactory;

    public function offenseQuestions()
    {
        return $this->hasMany('App\Models\legealCheckerQuestion','offense_id','offense_id');
    }
}
