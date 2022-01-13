<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conditionQuestion extends Model
{
    use HasFactory;
    public function ifyes()
    {
        return $this->hasOne('App\Models\conditionQuestion','question_id','if_yes');
    }

    public function ifno()
    {
        return $this->hasOne('App\Models\conditionQuestion','question_id','if_no');
    }
}
