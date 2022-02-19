<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        $orderId = $request->input('orderId');
        $couponeCode = $request->input('code');

        // Check if the coupon exists
        $coupon = Coupon::where('code', $couponeCode)->first();
        if (!$coupon) {
            return Redirect::back()->withErrors(['message' => 'Kupon nuk egziston']);
        }

        // Check if the coupon is used before
        $used = Coupon::where('code', $couponeCode)->where('used', 1)->first();
        if ($used) {
            return Redirect::back()->withErrors(['message' => 'Kupon i zgjedhur është përdorur']);
        }

        // Order used coupon
        Photo::where('folder_name', $orderId)->update(['coupon_id' => $coupon->id]);

        return redirect()->route('ngarko-foto.konfirmimi-final', $orderId);
    }
}
