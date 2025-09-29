<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\ProductController;

// Route::get('/shop-testtt', function () {
//     return "Shop module is working!";
// });
Route::group(['prefix' => 'admin/shop', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'ShopController@index');

    
    
    Route::get('product', 'ProductController@index')->name('product.index');
    Route::post('product', 'ProductController@store')->name('product.store');
    Route::post('product/update', 'ProductController@update')->name('product.update');
    Route::get('product/create', 'ProductController@create')->name('product.create');
    Route::get('product/getAllProducts', 'ProductController@getAllProductsData')->name('product.getAll');
    Route::get('product/getAllBooks', 'ProductController@getAllBooksData')->name('book.getAll');
    Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('product/destroy', 'ProductController@destroy')->name('product.delete');
    Route::post('product/file/destroy', 'ProductController@destroyFile')->name('product.file.delete');
});