<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;



Route::get('/', 'HomeController@index')->name('home');
Route::get('/home1', 'HomeController@home1');
Route::get('/home2', 'HomeController@home2');
Route::get('/slider', 'HomeController@slider');
Route::get('/test', 'HomeController@indexTest');

Route::get('/resize', 'ResizeController@index');
Route::get('/merchant', function (){
    return view('auth.merchant');
})->name('merchant')->middleware('guest');

Route::get('/admin/merchant/add', 'AdminController@addMerchant')->name('merchant.add');

Route::get('/account',function (){
    return view('accounts.account');
})->middleware('auth')->name('accnt');

Route::get('/contact', function (){
    return view('other.contact');
})->name('contact');

Route::get('/verify-otp',function (){
    return view('auth.otp');
})->middleware('ifotp');

Route::get('/admin/merchant/{user}/reset','AdminController@resetPass');

Route::post('/admin/merchant/{user}/reset','AdminController@updatePassword')->name('merchant.reset');

/*
|--------------------------------------------------------------------------
| Two Factor Authentication
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/2fa','PasswordSecurityController@show2faForm')->name('twofactor.authenticate');


Route::post('/verify-otp','Auth\RegisterController@verifyotp')->name('verifyotp')->middleware('ifotp');

Route::post('/generate2faSecret','PasswordSecurityController@generate2faSecret')->name('generate2faSecret');

Route::post('/2fa','PasswordSecurityController@enable2fa')->name('enable2fa');

Route::post('/disable2fa','PasswordSecurityController@disable2fa')->name('disable2fa');

Route::post('/2faVerify', function () {
    return redirect()->route('admin.dashboard');
})->name('2faVerify')->middleware('2fa');


/*
|--------------------------------------------------------------------------
| Two Factor Authentication End
|--------------------------------------------------------------------------
*/

Route::get('admin/ship-shipments', 'ShipRocketController@getShipShipments');

Route::get('logout', function (){
    return view('errors.404');
});


Route::get('admin/ship-order/{order}/device/{id}', 'ShipRocketController@createShipOrder')->name('ship.order');

Route::get('admin/view/{phone}/device', 'AdminController@viewDevice')->name('device.view');

Route::post('/contact', 'HomeController@storeContact')->name('contact');
Route::get('/testsms', 'HomeController@testsms')->name('testsms');

Route::patch ('/account','AccountController@storeAccount')->name('profile.update');

Route::get('/admin/phones/all', 'AdminController@allPhones')->name('phones.all');

Route::get('/admin/contacted', 'AdminController@showContacted')->name('admin.contacted');

Route::get('/admin/phones/{phone}/delete', 'AdminController@deletePhone')->name('phone.delete');

Route::get('/admin/phones/out-of-stock', 'AdminController@showOutOfStock')->name('phones.out_of_stock');

Route::post('/admin/phones/stock/{phone}/update', 'AdminController@updateOutOfStock')->name('phone.update.stock');

Route::post('/admin/phones/{phone}/update', 'AdminController@updatePhone')->name('phone.update');

Route::post('/admin/merchant/add', 'AdminController@storeMerchant')->name('merchant.store');

Route::get('/admin/merchant/{user}', 'AdminController@showMerchant')->name('merchant.view');

Route::get('/admin/merchant/{user}/edit', 'AdminController@editMerchant')->name('merchant.edit');

Route::patch('/admin/merchant/update/{user}', 'AdminController@updateMerchant')->name('merchant.update');

Route::get('/admin/merchant/delete/{user}', 'AdminController@deleteMerchant')->name('merchant.delete');

Route::get('/admin/merchants', 'AdminController@showMerchants')->name('merchant.all');

Route::get('/admin/users', 'AdminController@showUsers')->name('users.all');

Route::get('/admin/admins', 'AdminController@showAdmins')->name('admins.all');

Route::get('/admin/phone/{phone}/restore', 'AdminController@restoreAdvertisement')->name('phone.restore');

Route::get('/admin/accounts', 'AdminController@showAccounts')->name('admin.accounts');
Route::get('/admin/repair', 'AdminController@repair')->name('admin.repair');

Route::get('/admin/merchant/{user}/transactions', 'AdminController@merchantTransactions')->name('admin.merchant_transactions');

Route::get('/admin/merchant/{user}/settle', 'AdminController@settleMerchant')->name('admin.settle_merchant');

Route::post('/admin/merchant/{user}/settle', 'AdminController@storeSettlement')->name('merchant.store_settlement');
Route::post('/admin/sendlink', 'AdminController@sendlink');

Route::get('/admin/merchant/{user}/settlements', 'AdminController@viewSettlements')->name('admin.view_settlements');

Route::get('/admin/user/{user}', 'AdminController@userHistory')->name('user.history');

Route::get('admin/orders/date', 'AdminController@getOrdersByPhones')->name('orders.via.dates');

Route::post('admin/orders/date', 'AdminController@getOrdersBetweenDates')->name('orders.date');

Route::get('/admin/order/{order}', 'AdminController@displayOrder')->name('user.showorder');

Route::get('/admin/order/{order}/bank', 'AdminController@bankDetails')->name('order.bankdetails');

Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/orders', 'AdminController@showOrders')->name('admin.orders');

Route::get('/admin/orders/success', 'AdminController@showSuccessOrders')->name('orders.success');
Route::get('/admin/orders/cancelled', 'AdminController@cancelled')->name('orders.cancelled');

Route::get('/admin/orders/failed', 'AdminController@showFailedOrders')->name('orders.failed');

Route::get('/admin/orders/unprocessed', 'AdminController@showUnprocessedOrders')->name('orders.unprocessed');

Route::get('/admin/orders/{order}', 'AdminController@showOrder')->name('orders.order');

Route::get('/admin/lockscreen', function (){
    return view('admin.lockscreen');
})->name('admin.locked')->middleware(['auth','isAdmin','isLocked']);

Route::post('/admin/lockscreen', 'AdminController@checkLock')->name('lockscreen')->middleware('auth');

Route::get('/admin/brands', 'AdminController@showBrands')->name('admin.brands');

Route::get('/admin/models', 'AdminController@showModels')->name('admin.models');

Route::get('/admin/models/add', 'AdminController@addModel')->name('model.add');

Route::post('/admin/models/add', 'AdminController@storeModel')->name('model.store');

Route::get('/admin/models/{data}/edit', 'AdminController@editModel')->name('models.edit');

Route::patch('/admin/models/{data}/edit', 'AdminController@updateModel')->name('models.edit');

Route::get('/admin/models/{data}/delete', 'AdminController@deleteModel')->name('models.delete');

Route::get('/admin/comments', 'AdminController@comments')->name('admin.comments');
Route::post('/admin/{phone}/commentupdate', 'AdminController@commentupdate')->name('admin.commentUpdate');

Route::post('/merchant','HomeController@merchant')->name('merchant')->middleware('guest');
Route::post('/home/repair', 'HomeController@repair');

Route::post('/subscribe-to-offers', 'HomeController@subsribeToOffers');

Route::get('/admin/offer-subscribers', 'AdminController@offerSubscribers');

Route::get('/dashboard','AccountController@index')->name('account');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/track-your-order', function (){
    return view('other/track');
})->name('track-show');
Route::post('/track-your-order','ShipRocketController@getAwb')->name('track');

Auth::routes();

Route::post('login', 'Auth\LoginController@login');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/phones/add', 'PhoneController@create')->name('phone.add');
// Route::post('/phones/repair', 'PhoneController@repair')->name('phone.repair');


Route::post('/phones/add', 'PhoneController@store')->name('phone.add');

Route::patch('/phones/store/{phone}', 'PhoneController@storeedit')->name('phone.store');

Route::get('/apis/getmodel','ApiController@getModel');

Route::post('/apis/addtocart','ApiController@addToCart');

Route::post('/apis/removecart','ApiController@deleteFromCart');

Route::post('/apis/updatecart','ApiController@updateCart');

Route::post('/apis/updatetotal','ApiController@updateTotal');

Route::post('/api/isEligibleForDiscount', 'ApiController@isEligibleForDiscount');

Route::post('/apis/getstate','ApiController@getState')->name('getstate');

Route::get('/terms-and-conditions', function (){
    return view('footer.terms');
})->name('footer.terms');

Route::get('/return-policy', function (){
    return view('footer.return');
})->name('footer.return');

Route::get('/shipping-policy', function (){
    return view('footer.shipping');
})->name('footer.shipping');

Route::get('/cancellation-policy', function (){
    return view('footer.cancellation');
})->name('footer.cancellation');

Route::get('/about', function (){
    return view('other.about');
})->name('other.about');

Route::get('/privacy-policy', function (){
    return view('footer.privacy');
})->name('footer.privacy');

Route::get('/admin/merchants/requested','AdminController@showMerchantRequests')->name('admin.merchantrequests');

Route::get('/admin/user/{user}/ban','AdminController@banUser')->name('user.ban');

Route::get('/admin/user/{user}/unban','AdminController@unBanUser')->name('user.unban');

Route::get('/cart','OrderController@returnCart')->name('cart');

Route::post('/apply-coupon','HomeController@applyCoupon');

Route::get('/remove-coupon/{coupon_code}','HomeController@removeCoupon');

Route::get('/checkout','OrderController@checkout')->name('checkout')->middleware(['CartHasItems','AllAvailable']);

Route::get('/checkout/guest','OrderController@validateAndCheckout')->name('validateAndCheckout')->middleware(['CartHasItems','AllAvailable']);

Route::match(array('GET', 'POST'),'/indipay/response','OrderController@response')->middleware(['ShowResponse','isUser','auth']);

Route::get('/customer/dashboard','ApiController@getModel')->name('customer.dashboard');

Route::get('/accounts/phone/{phone}/orders','AccountController@showPhoneOrders')->name('phone.show');

Route::post('/checkout/dashboard','OrderController@storeOrder')->name('order.create')->middleware(['AllAvailable', 'CartHasItems']);

Route::get('/merchant/dashboard','ApiController@getModel')->name('merchant.dashboard');

Route::get('/store/{model?}','StoreController@all')->name('store.all');

Route::get('/stores/','StoreController@getPrice')->name('store.sort');

Route::get('/companies/','StoreController@companies');

Route::get('/phone/purchase/{phone}/{slug}/{color?}','ApiController@buyNow')->name('phone.buyNow');

Route::get('/store/show/{id}/{slug?}','StoreController@show')->name('store.show');

Route::get('/sort/stores','StoreController@sort')->name('store.sortt');

Route::post('/store/saveComment','StoreController@saveComment')->name('store.saveComment');


Route::get('/account/phones','AccountController@showphones')->name('phones.show');

Route::get('/account/settlements','AccountController@showSettlements')->name('account.settlements');

Route::get('/account/orders','AccountController@showorders')->name('phones.orders');
Route::post('/account/cancelorder','AccountController@cancelorder')->name('account.cancelorder');

Route::get('/account/phones/{phone}','PhoneController@remove')->name('phone.remove');

Route::get('/account/phones/{phone}/edit','AccountController@editphones')->name('phones.edit');

Route::get('/account/history','AccountController@showphones')->name('account.history');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');



