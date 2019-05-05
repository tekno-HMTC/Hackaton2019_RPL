<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    //
    public function vote($id)
	{
		$jawaban = DB::table('answers')->get();

		$jawaban2 = DB::table('answers')->where('id_jawaban', $id)->get()[0];
		//dd($jawaban2);
		$vote = $jawaban2->upvote + 1;
		$id_user = $jawaban2->id_user;
		$id_pertanyaan = $jawaban2->id_pertanyaan;
		$body = $jawaban2->body;
		DB::table('answers')->where('id_jawaban', $id)->update([
			'upvote' => $vote,
			'id_user' => $id_user,
			'body' => $body,
		]);

	return 	redirect()->back();

		// return view('/jawaban/ask_question', ['jawaban' => $jawaban]);
	}

	 public function unvote($id)
	{
		$jawaban = DB::table('answers')->get();

		$jawaban2 = DB::table('answers')->where('id_jawaban', $id)->get()[0];
		//dd($jawaban2);
		$vote = $jawaban2->upvote - 1;
		$id_user = $jawaban2->id_user;
		$id_pertanyaan = $jawaban2->id_pertanyaan;
		$body = $jawaban2->body;
		DB::table('answers')->where('id_jawaban', $id)->update([
			'upvote' => $vote,
			'id_user' => $id_user,
			'body' => $body,
		]);

	return 	redirect()->back();

		// return view('/jawaban/ask_question', ['jawaban' => $jawaban]);
	}
}
