<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artikel;
use App\Comment;
use DB;

class ArtikelController extends Controller
{
    public function index()
    {
    	$artikel = Artikel::all();
    	// var_dump($artikel); return;
		return view('artikel.index',compact('artikel'));
    }

    public function buat_artikel(Request $request)
    {
    	return view('artikel.buat_artikel');
    }

    public function store(Request $request)
    {
        $post = new artikel();
        $post->judul= $request->input('title');
        $post->isi_artikel= $request->input('content');
        $post->id_user= auth()->user()->id;
        $post->save();

    	return redirect('/artikel')->with('success','Artikel berhasil dibuat');
    }
}
