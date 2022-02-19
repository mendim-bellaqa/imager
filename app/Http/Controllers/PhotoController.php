<?php

namespace App\Http\Controllers;

use ZipArchive;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Photo;
use App\Models\Coupon;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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



    // voucher



    public function voucher()
    {
        $photo = Voucher::all();
        return view('admin.all-vouchers',['vouchers' => $photo]);
    }


    public function crvoucher()
    {
        return view('admin.create-vouchers');
    }


    public function addvoucher(request $request)
    {
        $totalWanted = 2;


        for ($i = 0; $i < $totalWanted; $i++ ) {
            $voucher = new Voucher();
            $voucher->code = rand();
            $voucher->value = $request->input('value');
            $voucher->save();
        }

        $photo = Voucher::all();
        // return view('admin.all-vouchers',['vouchers' => $photo]);
        return view('admin.all-vouchers',['vouchers' => $photo])->with('message', 'KUPONAT U GNENERUAN');
        // return $request->input('value');
        // $photo = new Voucher;
        // $value->value = $request->input('value');

        $photo = Voucher::find(0);
        $voucher = $photo->createVouchers(2, [
            'value' => $request->input('value')
        ]);

        $voucher->save();
        return view('admin.create-vouchers', ['vouchers' => $voucher]);

    }

    public function destroy($id)
        {
            $voucher= Voucher::where('id', $id)->get();
            $voucher->delete();

            return view('admin.all-vouchers');
        }




    // voucher END


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

            // Order has been saved, now redirect to info
            return view('dergo-fotografite.info')->with('orderId', $orderId);
        }
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

        $photo = Photo::where('folder_name', $request->orderId)->first();
        $totalPictures = Photo::where('folder_name', $request->orderId)->count();

        $pricePerPicture = 1;

        $posta = 2;

        if($totalPictures <= 4) {
            $pricePerPicture = 1;
        }

        if ( in_array($totalPictures, range(5,9)) ) {
            $pricePerPicture = 0.60;
        }

        if ( in_array($totalPictures, range(10,49)) ) {
            $pricePerPicture = 0.50;
        }

        if ( in_array($totalPictures, range(50,99)) ) {
            $pricePerPicture = 0.20;
        }

        if($totalPictures > 100) {
            $pricePerPicture = 0.12;
        }


        $total = $totalPictures * $pricePerPicture + $posta;


        // Final


        return view('dergo-fotografite.final', ['order' => $photo, 'totalPictures' => $totalPictures, 'pricePerPicture' => $pricePerPicture, 'total' => $total, 'posta' => $posta]);
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

    // CUPON CODE




    public function applyCouponCode()
    {
        $coupon = Coupon::where('code',$this->couponCode)->subtotal()->first();
        if(!$coupon)
            {
                session()->flash('coupon_message','Kodi i kuponit është i pavlefshëm!');
                return;
            }

        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            // 'cart_value' => $coupon->cart_value
        ]);

    }

    public function calculateDiscounts()
    {
        if(session()->has('coupon'))
        {
                if(session()->get('coupon')['type'] == 'fixed')
                {
                    $this->discount = session()->get('coupon')['value'];
                }
                    else
                    {
                        $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
                    }
                    $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
                    // $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
                    $this->totalAfterDiscount = $this->subtotalAfterDiscount +$this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
        {
            session()->forget('coupon');
        }
    }
