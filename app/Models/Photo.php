<?php

namespace App\Models;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function sasia()
    {
        $orderId = $this->folder_name;
        $totalPictures = Photo::where('folder_name', $orderId)->count();

        return $totalPictures;
    }
      
    public function total()
    {
        $orderId = $this->folder_name;
        $orderCoupon = $this->coupon;

        $totalPictures = Photo::where('folder_name', $orderId)->count();

        $pricePerPicture = 1;
        $posta = 2;

        if ($totalPictures <= 4) {
            $pricePerPicture = 1;
        }

        if (in_array($totalPictures, range(5, 9))) {
            $pricePerPicture = 0.60;
        }

        if (in_array($totalPictures, range(10, 49))) {
            $pricePerPicture = 0.50;
        }

        if (in_array($totalPictures, range(50, 99))) {
            $pricePerPicture = 0.20;
        }

        if ($totalPictures > 100) {
            $pricePerPicture = 0.12;
        }

        $total = $totalPictures * $pricePerPicture + $posta;

        // Apply discount
        if($orderCoupon) {
            $total = $total - $orderCoupon->value.' (- Kuponi)';
        }


        return $total.' €';
    }
}
