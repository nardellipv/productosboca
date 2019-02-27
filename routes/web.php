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

Route::get('/mail/contacto', 'ContactController@contactWeb')->name('contactWeb');
    Route::post('/mail/contacto/enviar_mail', 'ContactController@sendEmail')->name('sendEmail');


Route::get('/informacion/envios', 'InformationController@envios')->name('envios');
Route::get('/informacion/formas_pagos', 'InformationController@payments')->name('payments');
Route::get('/informacion/comprar', 'InformationController@buy')->name('buy');
Route::get('/informacion/terminos_condiciones', 'InformationController@termns')->name('termns');
Route::get('/informacion/politicas_privacidad', 'InformationController@policity')->name('policity');
//--------------------------

//Profile
Route::get('/perfil', 'Profile\ProfileController@profile')->name('profile');
Route::Patch('/perfil/update_data/{id}', 'Profile\ProfileController@updateData')->name('updateData');
Route::Patch('/perfil/update_password/{id}', 'Profile\ProfileController@updatePassword')->name('updatePassword');
//--------------------------