<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class termCondition extends Model
{
    use HasFactory;

    public function conditionQuestions()
    {
        return $this->hasMany('App\Models\termConditionQuestion','condition_id','condition_id');
    }
}
