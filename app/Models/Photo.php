<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use aberkanidev\Coupons\Traits\HasCoupons;
use BeyondCode\Vouchers\Traits\HasVouchers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use BeyondCode\Vouchers\Traits\HasVouchers;

class Photo extends Model
{
    use HasFactory;
    use HasVouchers;

    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
