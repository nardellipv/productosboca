<?php

Auth::routes(['verify' => true]);

//web
Route::get('/', 'HomeController@index')->name('home');
Route::get('/vista-rapida/{slug}', 'HomeController@quickView')->name('quickView');
Route::get('/categoria/{slug}', 'CategoryController@index')->name('index');
Route::get('/producto/{slug}', 'ProductController@index')->name('index');
Route::post('/producto/{slug}', 'ProductController@calcular')->name('calcular');
Route::post('/producto/rating/{id}', 'ProductController@rating')->name('rating');

Route::get('/carrito', 'BuyController@listProducts')->name('listProducts');
    Route::post('/carrito/procesar-pago', 'BuyController@checkout')->name('checkout');
    Route::delete('/carrito/eliminar-producto/{id}', 'BuyController@deleteItem')->name('deleteItem');
    Route::post('/carrito/agregar/{id}', 'BuyController@addProduct')->name('addProduct');

Route::post('/carrito/discount', 'DiscountController@coupon')->name('coupon');
//--------------------------