<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Department;
use App\Http\Controllers\Employ;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// DEPARTMENTS ROUTES

Route::get('/ems/departments', [Department::class, 'view_all']);
Route::post('/ems/department/add', [Department::class, 'add']);
Route::get('/ems/department/{id}/get', [Department::class, 'get']);
Route::patch('/ems/department/{id}/edit', [Department::class, 'edit']);
Route::delete('/ems/department/{id}/delete', [Department::class, 'delete']);


Route::get('/ems/employ/{id}/get', [Employ::class, 'get']);
Route::get('/ems/employs', [Employ::class, 'search']);
Route::post('/ems/department/add/employ', [Employ::class, 'add']);
Route::patch('/ems/employ/{id}/edit', [Employ::class, 'edit']);
Route::delete('/ems/employ/{id}/delete', [Employ::class, 'delete']);


Route::post('/ems/employ/add/contact', [Employ::class, 'add_contact']);
Route::post('/ems/employ/add/address', [Employ::class, 'add_address']);

Route::patch('/ems/employ/edit/{id}/contact', [Employ::class, 'edit_contact']);
Route::patch('/ems/employ/edit/{id}/address', [Employ::class, 'edit_address']);

Route::delete('/ems/employ/{id}/contact', [Employ::class, 'delete_contact']);
Route::delete('/ems/employ/{id}/address', [Employ::class, 'delete_address']);
