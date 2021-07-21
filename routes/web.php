<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogEntryController;

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
)->name('render');

Route::get(
  '/planned',
  [BlogEntryController::class, 'show_planned']
)->name('planned');


Route::get(
  '/posts/create',
  [BlogEntryController::class, 'create_form']
)->name('create_blogentry_form');
Route::post(
  '/posts/create',
  [BlogEntryController::class, 'create']
)->name('create_blogentry');

Route::get(
  '/posts/{id}/update',
  [BlogEntryController::class, 'update_form']
)->name('update_blogentry_form');
Route::post(
  '/posts/{id}/update',
  [BlogEntryController::class, 'update']
)->name('update_blogentry');

Route::post(
  '/posts/{id}/delete',
  [BlogEntryController::class, 'delete']
)->name('delete_blogentry');

Route::get(
  '/posts/{id}',
  [BlogEntryController::class, 'show']
)->name('posts');
