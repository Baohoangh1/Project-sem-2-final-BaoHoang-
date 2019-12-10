<?php

Route::get('/hotel-management', 'HotelController@hotelManagementView')->name('hotel-management');
Route::get('/search-hotels', 'HotelController@searchHotels');
Route::get('/show-hotel/{id}', 'HotelController@showHotel');
Route::get('/delete-hotel/{id}', 'HotelController@deleteHotel');
Route::get('/show-hotel/{id}', 'HotelController@showHotel');
Route::post('/save-hotel', 'HotelController@storeHotel');

Route::get('/business-management', 'BusinessController@businessManagementView')->name('business-management');
Route::get('/search-bills', 'BusinessController@searchBills');

// Route::get('/user-management', 'UserController@userManagementView')->name('user-management');
// Route::get('/search-users', 'UserController@searchUsers');
// Route::get('/show-user/{id}', 'UserController@showUser');
// Route::get('/delete-user/{id}', 'UserController@deleteUser');
// Route::get('/show-user/{id}', 'UserController@showUser');
// Route::post('/save-user', 'UserController@storeUser');


Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');



Route::get('/room-management', 'RoomController@roomManagementView')->name('room-management');
Route::get('/search-rooms', 'RoomController@searchRooms');
Route::get('/show-room/{id}', 'RoomController@showRoom');
Route::get('/delete-room/{id}', 'RoomController@deleteRoom');
Route::get('/show-room/{id}', 'RoomController@showRoom');
Route::post('/save-room', 'RoomController@storeRoom');

Route::get('/service-management', 'ServiceController@serviceManagementView')->name('service-management');
Route::get('/search-services', 'ServiceController@searchServices');
Route::get('/show-service/{id}', 'ServiceController@showService');
Route::get('/delete-service/{id}', 'ServiceController@deleteService');
Route::get('/show-service/{id}', 'ServiceController@showService');
Route::post('/save-service', 'ServiceController@storeService');

Route::get('/customer-management', 'CustomerController@customerView')->name('customer-management');
Route::get('/search-customer','CustomerController@searchCustomer');
Route::get('/show-customer/{id}','CustomerController@customerShow');
Route::get('/delete-customer/{id}','CustomerController@customerDelete');
Route::post('/save-customer','CustomerController@customerStore');
