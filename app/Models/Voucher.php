<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BeyondCode\Vouchers\Traits\HasVouchers;

class Voucher extends Model
{
    use HasVouchers;

    use HasFactory;
    protected $table = 'vouchers';
    protected $fillable = [
        'value',
    ];


    protected $casts = [
        'data' => 'collection'
    ];

}
