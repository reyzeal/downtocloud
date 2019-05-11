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

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Route::get('list',function(){
//   return Storage::cloud()->listContents('/',false);
// });

Auth::routes();

Route::get('/{link}',function($link){
  $client = new \GuzzleHttp\Client(['verify'=>false]);
  $request = $client->get($link,[
      // 'timeout' => 15,
      // 'headers' => $headers,
      // 'cookies' => $cookieJar
  ],[]);

  // $data = file_get_contents($link);
  return htmlspecialchars($request->getBody());
})->where(['link'=>'(.*)']);
// Route::get('/home', 'HomeController@index')->name('home');
