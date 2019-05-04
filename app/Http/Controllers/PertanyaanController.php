<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Artikel;
use App\Comment;
use App\Pertanyaan;


class PertanyaanController extends Controller
{
    //
     public function index()
    {
    	$id = Auth::id();
		$pertanyaan = DB::table('questions')->where('id_user', $id)->get();
		
    	return view('/pertanyaan/index',['pertanyaan' => $pertanyaan]);
 
    }

    public function tambah(Request $request)
	{
	 
		// memanggil view tambah
		return view('/pertanyaan/tambah');
	 
	}

	public function read($id)
	{
		$pertanyaan = DB::table('questions')->where('id_pertanyaan', $id)->get()[0];
		// return $pertanyaan;
		return view('/pertanyaan/read', ['pertanyaan' => $pertanyaan]);
	}

    public function store(Request $request)
	{
		
		$request->id = Auth::id();
		$request->upvote = 0;
		DB::table('questions')->insert([
			'id_user' => $request->id,
			'title' => $request->judul,
			'body' => $request->pertanyaan,
			'upvote' => $request->upvote,
			//'tag'=>$request->tag
		]);
		
		return redirect('/pertanyaan');
	 
	}
}
