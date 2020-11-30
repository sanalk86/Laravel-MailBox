<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
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
    return view('welcome');
});
Route::get('mailbox',['as' => 'mailbox.search', 'uses' => 'App\Http\Controllers\MailboxController@index']);
Route::get('mailbox/delete/{id}',['as' => 'mailbox.delete', 'uses' => 'App\Http\Controllers\MailboxController@destroy']);
Route::get('mailbox/index/{id?}',['as' => 'mailbox.index', 'uses' => 'App\Http\Controllers\MailboxController@index']);
