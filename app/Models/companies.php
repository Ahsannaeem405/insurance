<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class companies extends Model
{
    use HasFactory;

    public function disable()
    {
        return $this->hasOne('App\Models\companyDisable','company_id','id')
            ->where('type','fex')
            ->where('user_id',Auth::user()->id);
    }
    public function disableterm()
    {
        return $this->hasOne('App\Models\companyDisable','company_id','id')
            ->where('type','term')
            ->where('user_id',Auth::user()->id);
    }
}
