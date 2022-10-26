<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// use api/users in frontend
Route::get('/users', function(){
  return User::all();
});

// use api/users/search in frontend
Route::get('/users/search', function(Request $request){
  $user = $request->input('user');

  return User::where('firstName', 'like', '%'.$user.'%')->get();
});

// post new users in database
Route::post('/user', function(Request $request){
  $request->validate([
    'firstName' => 'required',
    'lastName' => 'required',
    'email' => 'required|unique:users',
    'password' => 'required',
	], [
		'firstName.required' => 'O campo primeiro nome é obrigatório',
		'lastName.required' => 'O campo sobrenome é obrigatório',
		'email.unique' => 'Este e-mail já está cadastrado',
		'password.required' => 'O campo senha é obrigatório',
	]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
