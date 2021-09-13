<?php

use App\Http\Controllers\VoteProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Voters;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*____________________________________________________
  |
  |Administrator endpoints
  |____________________________________________________

*/
Route::post('/admin/register',[Admins::class,'store']);
Route::get('admin/login',[Admins::class,'login']);
Route::get('/admin/logout',[Admins::class,'logout']);
/*______________________________________________________
  |
  |Candidate endpoints
  |_____________________________________________________
*/
Route::post('/candidate/register',[Candidates::class,'store']);
Route::put('/candidate/update/{id}',[Candidates::class,'update']);
Route::get("/candidate/{id}",[Candidates::class,'show']);
Route::delete('candidate/delete/{id}',[Candidates::class,'destroy']);
Route::get('/candidate/login',[Candidates::class,'login']);
Route::get('/candidate/logout',[Candidates::class,'logout']);
/*_________________________________________________________
  |
  |Voter endpoints
  |________________________________________________________
*/
Route::post('/voter/register',[Voters::class,'store']);
Route::get('/voter/list',[Voters::class,'index']);
Route::get('/voter/{id}',[Voters::class,'show']);
Route::put("/voter/update/id",[Voters::class,'update']);
Route::delete('/voter/delete/{id}',[Voters::class,'destroy']);

Route::post('/vote/{id}',[VoteProcess::class,'processVote']);
