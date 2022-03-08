<?php

namespace App\Http\Controllers;

use ZipArchive;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Photo;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function voucher()
    {
        $photo = Coupon::all();

        return view('admin.all-vouchers', ['vouchers' => $photo]);
    }

    public function crvoucher()
    {
        return view('admin.create-vouchers');
    }

    public function addvoucher(request $request)
    {
        $totalWanted = 10;

        for ($i = 0; $i < $totalWanted; $i++) {
            $coupon = new Coupon();
            $coupon->code = rand();
            $coupon->value = $request->input('value');
            $coupon->save();
        }

        $photo = Coupon::all();

        return view('admin.all-vouchers', ['vouchers' => $photo])->with('message', 'KUPONAT U GNENERUAN');
    }

    public function destroy($id)
    {
        $voucher= Coupon::where('id', $id)->get();
        $voucher->delete();

        return view('admin.all-vouchers');
    }

    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user_id = Auth::user()->name;
            $user_id = Auth::user()->email;
            $user_id = User::all();

            return view('dergo-fotografite.index', ['users' => $user_id]);
        } else {
            return view('auth.register');
        }
    }

    public function saveRecord(Request $request)
    {
        if (!Auth::check()) {
            return view('auth.login');
        }

        $userId = Auth::user()->id;

        if ($request->hasFile('fileupload')) {
            $dt = Carbon::now();
            $orderId = rand(1111111111, 9999999999);
            $dateTime = $dt->toDayDateTimeString();
            Storage::disk('local')->makeDirectory($orderId, 0775, true);

            foreach ($request->fileupload as $photo) {
                $destinationPath = $orderId. '/';
                $file_name = $photo->getClientOriginalName();
                $photos = [
                    'file_name' => $file_name,
                    'path' => $destinationPath.$file_name,
                    'user_id' => $userId,
                    'folder_name' => $orderId,
                    'datetime' => $dateTime,
                ];

                Storage::disk('local')->put($orderId.'/'.$file_name, file_get_contents($photo->getRealPath()));
                DB::table('photos')->insert($photos);
            }

            return redirect()->route('ngarko-foto.shfaq-infot', ['orderId' => $orderId]);
        }
    }

    public function showInfos($orderId)
    {
        return view('dergo-fotografite.info')->with('orderId', $orderId);
    }

    public function saveInfo(Request $request)
    {
        $userId = Auth::user()->id;

        $currentUser = User::find($userId);

        if ($request->has('phone_number')) {
            $currentUser->phone_number = $request->phone_number;
        }

        if ($request->has('city')) {
            $currentUser->city = $request->city;
        }

        if ($request->has('address')) {
            $currentUser->address = $request->address;
        }

        $currentUser->save();

        return redirect()->route('ngarko-foto.konfirmimi-final', ['orderId' => $request->orderId]);
    }

    public function lastConfirmationView($orderId)
    {
        $photo = Photo::where('folder_name', $orderId)->first();
        $orderCoupon = $photo->coupon;
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
            $total = $total - $orderCoupon->value;
        }

        $discountFromCoupon = $orderCoupon ? $orderCoupon->value : null;

        return view('dergo-fotografite.final', ['order' => $photo, 'totalPictures' => $totalPictures, 'pricePerPicture' => $pricePerPicture, 'total' => $total, 'posta' => $posta, 'discountFromCoupon' => $discountFromCoupon]);
    }

    public function lastConfirmationSave(Request $request) {
        $orderId = $request->orderId;

        $photo = Photo::where('folder_name', $orderId)->first();
        $photo->status = 'Pending';
        $photo->save();

        return redirect()->route('porosit.shfaq');
    }

    public function download($orderId)
    {
        $zip = new ZipArchive();
        $folderName = storage_path("app/". $orderId);
        $newZipfileName = storage_path("app/". $orderId. ".zip");

        if ($zip->open($newZipfileName, ZipArchive::CREATE)== true) {
            $files = File::files($folderName);

            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        } else {
            return "Sorry";
        }

        return response()->download($newZipfileName)->deleteFileAfterSend(true);
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)->subtotal()->first();
        if (!$coupon) {
            session()->flash('coupon_message', 'Kodi i kuponit është i pavlefshëm!');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
        ]);
    }

    public function calculateDiscounts()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }

            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount +$this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }
}
