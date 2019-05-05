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



Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'comment'],function(){
    Route::get('/index', 'CommentController@index')->name('comments');
    Route::get('/', function(){
        return view('comment/comment');
    });
    // Route::post('/', function(Request $request){
    //     return $request->all();
    // })->name('comment.store')->middleware('auth');
    Route::post('create', 'CommentController@create')->name('comment.create')->middleware('auth');
    Route::post('update/{id}', 'CommentController@update')->name('comments.update')->middleware('auth');
    Route::delete('delete', 'CommentController@delete')->name('comments.delete')->middleware('auth');
    Route::post('edit/{id}', 'CommentController@edit')->name('comments.edit')->middleware('auth');
});

Route::get('/tes', function(){
    return view('answer/answer');
})->name('tes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tes2', function(){
    return view('texteditor');
});

Route::get('/pertanyaan','PertanyaanController@index')->name('pertanyaan');
Route::post('/pertanyaan/store','PertanyaanController@store')->name('pertanyaan.store');
Route::get('/pertanyaan/read/{id_pertanyaan}', 'PertanyaanController@read');
Route::get('/pertanyaan/tambah', 'PertanyaanController@tambah')->name('pertanyaan.tambah');
Route::get('/pertanyaan/ask_question', 'PertanyaanController@ask_question')->name('pertanyaan.ask_question');
Route::get('/pertanyaan/vote/{id_pertanyaan}','PertanyaanController@vote')->name('pertanyaan.vote');
Route::get('/pertanyaan/unvote/{id_pertanyaan}','PertanyaanController@unvote')->name('pertanyaan.unvote');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return redirect('/home');
    });

	Route::get('/artikel', 'ArtikelController@index');
	Route::get('/buat_artikel', 'ArtikelController@buat_artikel');
	Route::post('/post_artikel', 'ArtikelController@store')->name('post.store');
	// Route::get('/looklocation/{id}','HomeController@looklocation');
	// Route::post('/editprofile','LoginRegister@editprofile');
});

Route::post('/answer/store',function(Request $request){
    // return $request;   		
    $request->id = Auth::id();
    $request->upvote = 0;
    DB::table('answers')->insert([
        'id_user' => $request->id,
        'id_pertanyaan' => $request->id_pertanyaan,
        'body' => $request->jawaban,
        'upvote' => $request->upvote,
    ]);
    
    return $request;
    
})->name('answer.store');