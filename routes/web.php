<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogEntryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;

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

Route::get(
  '/',
  [BlogEntryController::class, 'show_published']
)->name('home');

Route::post(
  '/render',
  [BlogEntryController::class, 'render']
)->name('render')->middleware('auth');

Route::get(
  '/planned',
  [BlogEntryController::class, 'show_planned']
)->name('planned')->middleware('auth');

Route::post(
  '/authenticate',
  [AuthController::class, 'authenticate']
)->name('authenticate')->middleware('guest');
Route::get(
  '/login',
  [AuthController::class, 'login']
)->name('login')->middleware('guest');
Route::post(
  '/logout',
  [AuthController::class, 'logout']
)->name('logout')->middleware('auth');

Route::get(
  '/impressum',
  function(Request $request) { return view('impressum'); }
)->name('impressum');

Route::get(
  '/about_me',
  function(Request $request) { return view('about_me'); }
)->name('about_me');

Route::get(
  '/settings',
  [SettingController::class, 'settings_form']
)->name('settings');
Route::post(
  '/settings',
  [SettingController::class, 'update_settings']
)->name('update_settings');


Route::get(
  '/posts/create',
  [BlogEntryController::class, 'create_form']
)->name('create_blogentry_form')->middleware('auth');
Route::post(
  '/posts/create',
  [BlogEntryController::class, 'create']
)->name('create_blogentry')->middleware('auth');

Route::get(
  '/posts/{id}/update',
  [BlogEntryController::class, 'update_form']
)->name('update_blogentry_form')->middleware('auth');
Route::post(
  '/posts/{id}/update',
  [BlogEntryController::class, 'update']
)->name('update_blogentry')->middleware('auth');

Route::post(
  '/posts/{id}/delete',
  [BlogEntryController::class, 'delete']
)->name('delete_blogentry')->middleware('auth');

Route::get(
  '/posts/{id}',
  [BlogEntryController::class, 'show']
)->name('posts');
