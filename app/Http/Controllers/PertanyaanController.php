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
		$pertanyaan->komentar = DB::table('comments')->where([['id_tanya_jawab', $id],['flag', '1']])->get();
		
		$jawaban = DB::table('answers')->where('id_pertanyaan', $id)->get();
		// return $jawaban;
		return view('/pertanyaan/read', ['pertanyaan' => $pertanyaan],['jawaban' => $jawaban ]);
	}

	public function vote($id)
	{
		$pertanyaan = DB::table('questions')->get();

		$pertanyaan2 = DB::table('questions')->where('id_pertanyaan', $id)->get()[0];
		//dd($pertanyaan2);
		$vote = $pertanyaan2->upvote + 1;
		$id_user = $pertanyaan2->id_user;
		$judul = $pertanyaan2->judul;
		$body = $pertanyaan2->pertanyaan;
		$tag = $pertanyaan2->tag;
		DB::table('questions')->where('id_pertanyaan', $id)->update([
			'upvote' => $vote,
			'id_user' => $id_user,
			'judul' =>$judul,
			'pertanyaan' => $body,
			'tag' => $tag
		]);

return 	redirect()->back();

		// return view('/pertanyaan/ask_question', ['pertanyaan' => $pertanyaan]);
	}

	public function ask_question()
	{
		$pertanyaan = DB::table('questions')->get();
		return view('/pertanyaan/ask_question', ['pertanyaan' => $pertanyaan]);
	}

    public function store(Request $request)
	{
		
		$request->id = Auth::id();
		$request->upvote = 0;
		DB::table('questions')->insert([
			'id_user' => $request->id,
			'judul' => $request->judul,
			'pertanyaan' => $request->pertanyaan,
			'upvote' => $request->upvote,
			'tag'=>$request->tag
		]);
		
		return redirect('/pertanyaan');
	 
	}
}
