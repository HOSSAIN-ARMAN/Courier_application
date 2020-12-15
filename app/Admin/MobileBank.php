<?php

namespace App\Admin;

use App\Merchent\MerchentMobileBankInfo;
use Illuminate\Database\Eloquent\Model;

class MobileBank extends Model
{
    protected $guarded = [];
    public function merchentMobileBankInfo(){
        return $this->belongsTo(MerchentMobileBankInfo::class);
    }
}
