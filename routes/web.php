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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/project-notes', function () {
    return view('project-notes');
});

Route::get('/login', 'AuthController@showLoginPage');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/attorneys', 'AttorneyController@index')->middleware('auth');
Route::get('/attorney/{id}', 'AttorneyController@show')->middleware('auth');
Route::get('/favorite-attorney/{id}', 'AttorneyController@favoriteAttorney')->middleware('auth');
Route::get('/remove-favorite-attorney/{id}', 'AttorneyController@removeFavoriteAttorney')->middleware('auth');

/*Route::get('/auth', function () {

    $query = http_build_query(([
        'client_id'     => '15',
        'redirect_uri'  => '127.0.0.1:8000/request-token',
        'response_type' => 'code',
        'scope'         => '*'
    ]));

    return redirect('https://dev.uscca.services/oauth/authorize?' . $query);
});

Route::get('/request-token', function (Request $request) {

    $client = new GuzzleHttp\Client();

    $response = $client->request(
        'POST',
        'https://dev.uscca.services/oauth/token', [
            'form_params' => [
                'grant_type'     => 'password',
                'client_id'      => '15',
                'client_secrect' => 'OBhESliYtjNK2Ph3EEm68XGoB4D2EwBXN0oEzU2Z',
                'username'       => 'interview+drew@uscca.com',
                'password'       => 'deltadefenseinterview',
                'scope'          => '*',
                'code'           => $request->code,
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
});*/


