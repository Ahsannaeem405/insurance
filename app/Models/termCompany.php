<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class termCompany extends Model
{
    use HasFactory;

    public function disableterm()
    {
        return $this->hasOne('App\Models\companyDisable','company_id','id')
            ->where('type','term')
            ->where('user_id',Auth::user()->id);
    }
}
