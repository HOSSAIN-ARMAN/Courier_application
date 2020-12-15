<?php

namespace App\Merchent;

use App\Admin\MobileBank;
use Illuminate\Database\Eloquent\Model;

class MerchentMobileBankInfo extends Model
{
    protected $guarded =[];
    public function mobileBanks(){
        return $this->hasMany(MobileBank::class, 'id');
    }
}
