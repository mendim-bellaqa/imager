<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\UserPorositeController;
use App\Http\Controllers\AdminPorositeController;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Dergo fotografit
Route::get('/dergo-fotografite', [PhotoController::class, 'index'])->name('dergo.fotografite');
Route::post('dergo-fotografite/ruaj', [PhotoController::class, 'saveRecord'])->name('ngarko-foto/save');
Route::get('dergo-fotografite/shfaq-infot/{orderId}', [PhotoController::class, 'showInfos'])->name('ngarko-foto.shfaq-infot');
Route::post('dergo-fotografite/ruaj-infot', [PhotoController::class, 'saveInfo'])->name('ngarko-foto.infot');
Route::get('/dergo-fotografit/konfirmimi-final/{orderId}', [PhotoController::class, 'lastConfirmationView'])->name('ngarko-foto.konfirmimi-final');
Route::post('/dergo-fotografit/konfirmimi-final', [PhotoController::class, 'lastConfirmationSave'])->name('ngarko-foto.ruaj-konfirmimin-final');

// View Orders
Route::get('porosit', [UserPorositeController::class, 'viewOrders'])->name('porosit.shfaq');

// Coupon Routes
Route::post('coupons/apply', [CouponController::class, 'apply'])->name('coupons.apply');

Route::get('/rreth-nesh', function () {
    return view('rreth-nesh');
});
Route::get('/regjistrohu', function () {
    return view('auth.register');
});
Route::get('/kyqu', function () {
    return view('auth.login');
});
Route::get('/porosi-info', function () {
    return view('porosi-info');
});
Route::get('/llogaria', function () {
    return view('profile.show');
});
Route::get('/privatesia-kushtet', function () {
    return view('terms');
});

// Auth Routes

Route::get('/voucher', 'PhotoController@voucher')->name('voucher');

Route::get('/dashboard/kuponat/all', [PhotoController::class, 'voucher'])->name('voucher');

Route::get('/dashboard/kuponat/krijo', [PhotoController::class, 'crvoucher'])->name('voucher.create');

Route::get('/dashboard/kuponat/gjenero', [PhotoController::class, 'addvoucher'])->name('voucher.generate');

Route::put('/dashboard/kuponat/fshij/{id}', [PhotoController::class, 'destroy'])->name('voucher.destroy');



Route::get('/admin/coupons',[AdminCouponsComponent::class, 'render'])->name('admin.coupons');
Route::get('/admin/coupon/add',[AdminAddCouponComponent::class,'render'])->name('admin.addcoupon');
Route::get('/admin/coupon/edit/{coupon_id}',[AdminEditCouponComponent::class,'render'])->name('admin.editcoupon');




// Private Routes
Route::get('ngarko-foto/new', [PhotoController::class, 'index'])->name('ngarko-foto/new');

Route::post('admin/photo/download/{order_id}', [PhotoController::class, 'download'])->name('admin/photo/download');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('adminChecker')->name('dashboard');

Route::get('/admin-porosite',[AdminPorositeController::class, 'index'])->middleware('adminChecker');

Route::get('/cmimet', function () {
    return view('cmimet');
})->middleware('adminChecker');

Route::get('/perdoruesit',[AllUsersController::class, 'show'])->middleware('adminChecker');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
