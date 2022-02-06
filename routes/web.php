<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Auth::routes();
Route::get('/', 'App\Http\Controllers\User\PageController@index')->name('user.index');

Route::get('/contact', 'App\Http\Controllers\User\PageController@contact')->name('user.contact');
Route::get('/faq', 'App\Http\Controllers\User\PageController@faq')->name('user.faq');

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return redirect()->route('user.product.index');
    });
    Route::get('/all', 'App\Http\Controllers\User\ProductController@index')->name('user.product.index');
    Route::get('/search', 'App\Http\Controllers\User\ProductController@search')->name('user.product.search');
    Route::get('best', 'App\Http\Controllers\User\ProductController@best')->name('user.product.best');
    Route::get('promo', 'App\Http\Controllers\User\ProductController@promo')->name('user.product.promo');
    Route::get('category', 'App\Http\Controllers\User\CategoryController@index')->name('user.category.index');
    Route::get('category/{slug}', 'App\Http\Controllers\User\ProductController@category')->name('user.product.category');
    Route::get('/detail/{slug}', 'App\Http\Controllers\User\ProductController@detail')->name('user.product.detail');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('admin.index');

        Route::get('address', 'App\Http\Controllers\Admin\AddressController@index')->name('admin.address.index');
        Route::get('address/edit/{id}', 'App\Http\Controllers\Admin\AddressController@edit')->name('admin.address.edit');
        Route::get('address/get/{id}', 'App\Http\Controllers\Admin\AddressController@get')->name('admin.address.get');
        Route::post('address/save', 'App\Http\Controllers\Admin\AddressController@save')->name('admin.address.save');
        Route::post('address/update/{id}', 'App\Http\Controllers\Admin\AddressController@update')->name('admin.address.update');

        Route::get('category', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.category.index');
        Route::get('category/add', 'App\Http\Controllers\Admin\CategoryController@add')->name('admin.category.add');
        Route::post('category/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('admin.category.store');
        Route::post('category/update', 'App\Http\Controllers\Admin\CategoryController@update')->name('admin.category.update');
        Route::get('category/edit', 'App\Http\Controllers\Admin\CategoryController@edit')->name('admin.category.edit');
        Route::delete('category/delete', 'App\Http\Controllers\Admin\CategoryController@delete')->name('admin.category.delete');

        Route::get('product', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.product.index');
        Route::get('product/add', 'App\Http\Controllers\Admin\ProductController@add')->name('admin.product.add');
        Route::post('product/store', 'App\Http\Controllers\Admin\ProductController@store')->name('admin.product.store');
        Route::get('product/edit', 'App\Http\Controllers\Admin\ProductController@edit')->name('admin.product.edit');
        Route::delete('product/delete', 'App\Http\Controllers\Admin\ProductController@delete')->name('admin.product.delete');
        Route::post('product/update', 'App\Http\Controllers\Admin\ProductController@update')->name('admin.product.update');

        Route::get('order', 'App\Http\Controllers\Admin\OrderController@index')->name('admin.order.index');
        Route::delete('order/delete', 'App\Http\Controllers\Admin\OrderController@delete')->name('admin.order.delete');
        Route::get('order/detail/{id}', 'App\Http\Controllers\Admin\OrderController@detail')->name('admin.order.detail');
        Route::get('order/confirm/{id}', 'App\Http\Controllers\Admin\OrderController@confirm')->name('admin.order.confirm');
        Route::post('order/receipt', 'App\Http\Controllers\Admin\OrderController@receipt')->name('admin.order.receipt');

        Route::get('payment', 'App\Http\Controllers\Admin\PaymentController@index')->name('admin.payment.index');
        Route::get('payment/edit', 'App\Http\Controllers\Admin\PaymentController@edit')->name('admin.payment.edit');
        Route::get('payment/add', 'App\Http\Controllers\Admin\PaymentController@add')->name('admin.payment.add');
        Route::post('payment/store', 'App\Http\Controllers\Admin\PaymentController@store')->name('admin.payment.store');
        Route::delete('payment/delete', 'App\Http\Controllers\Admin\PaymentController@delete')->name('admin.payment.delete');
        Route::post('payment/update', 'App\Http\Controllers\Admin\PaymentController@update')->name('admin.payment.update');

        Route::get('faq', 'App\Http\Controllers\Admin\FAQController@index')->name('admin.faq.index');
        Route::get('faq/edit', 'App\Http\Controllers\Admin\FAQController@edit')->name('admin.faq.edit');
        Route::get('faq/add', 'App\Http\Controllers\Admin\FAQController@add')->name('admin.faq.add');
        Route::post('faq/store', 'App\Http\Controllers\Admin\FAQController@store')->name('admin.faq.store');
        Route::delete('faq/delete', 'App\Http\Controllers\Admin\FAQController@delete')->name('admin.faq.delete');
        Route::post('faq/update', 'App\Http\Controllers\Admin\FAQController@update')->name('admin.faq.update');

        Route::get('user', 'App\Http\Controllers\Admin\UserController@index')->name('admin.user.index');

        Route::get('report', 'App\Http\Controllers\Admin\ReportController@index')->name('admin.report.index');
        Route::get('report/export', 'App\Http\Controllers\Admin\ReportController@export')->name('admin.report.export');
        Route::get('report/export/all', 'App\Http\Controllers\Admin\ReportController@multiExport')->name('admin.report.multiExport');

        Route::get('settings', 'App\Http\Controllers\Admin\SettingController@index')->name('admin.settings.index');
        Route::post('settings/update', 'App\Http\Controllers\Admin\SettingController@update')->name('admin.settings.update');
    });
});

Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::post('/cart/save', 'App\Http\Controllers\User\CartController@save')->name('user.cart.save');
    Route::get('/cart', 'App\Http\Controllers\User\CartController@index')->name('user.cart.index');
    Route::post('/cart/update', 'App\Http\Controllers\User\CartController@update')->name('user.cart.update');
    Route::get('/cart/delete/{id}', 'App\Http\Controllers\User\CartController@delete')->name('user.cart.delete');

    Route::get('/address', 'App\Http\Controllers\User\AddressController@index')->name('user.address.index');
    Route::get('/city', 'App\Http\Controllers\User\AddressController@getCity')->name('user.address.city');
    Route::get('/service', 'App\Http\Controllers\User\AddressController@getService')->name('user.address.service');
    Route::post('/address/save', 'App\Http\Controllers\User\AddressController@save')->name('user.address.save');
    Route::post('/address/update/{id}', 'App\Http\Controllers\User\AddressController@update')->name('user.address.update');
    Route::get('/address/change/user', 'App\Http\Controllers\User\AddressController@edit')->name('user.address.change');

    Route::get('/checkout', 'App\Http\Controllers\User\CheckoutController@index')->name('user.checkout');

    Route::post('/order/save', 'App\Http\Controllers\User\OrderController@save')->name('user.order.save');
    Route::get('/order/success', 'App\Http\Controllers\User\OrderController@success')->name('user.order.success');
    Route::get('/order', 'App\Http\Controllers\User\OrderController@index')->name('user.order.index');
    Route::get('/order/detail', 'App\Http\Controllers\User\OrderController@detail')->name('user.order.detail');
    Route::get('/order/accept/{id}', 'App\Http\Controllers\User\OrderController@accept')->name('user.order.accept');
    Route::get('/order/cancel/{id}', 'App\Http\Controllers\User\OrderController@cancel')->name('user.order.cancel');
    Route::get('/order/pay/{id}', 'App\Http\Controllers\User\OrderController@payment')->name('user.order.payment');
    Route::post('/order/proof/{id}', 'App\Http\Controllers\User\OrderController@proof')->name('user.order.proof');

    Route::get('profile', 'App\Http\Controllers\User\ProfileController@index')->name('user.profile.index');
});

Route::group(['prefix' => 'file-manager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
