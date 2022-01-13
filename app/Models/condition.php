<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class condition extends Model
{
    use HasFactory;

    public function conditionQuestions()
    {
    return $this->hasMany('App\Models\conditionQuestion','condition_id','condition_id');
    }


}
