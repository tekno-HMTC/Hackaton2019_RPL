<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artikel;
use App\Comment;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

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

    public function edit($id_artikel)
    {
        $post = artikel::where('id_artikel', $id_artikel)->get();
        if($post==null){
            return redirect('/post');
        }
        return view('artikel.edit_artikel', compact('post'));
    }

    public function update(Request $r)
    {
        var_dump($r);return;
        $instansi=artikel::find($r->id);
        if($instansi==null)
        {
            Auth::logout();
            return redirect('/login');
        }
        $instansi->nama=$r->instansi;
        $instansi->save();
        return redirect('/instansi')->with('message','Sukses Mengedit Instansi/Mitra');
    }

    public function delete($post)
    {
        $post = artikel::where('id_artikel', $post)->delete();
        return redirect('/artikel')->with('danger','Artikel berhasil dihapus');
    }

    public function show($id_artikel)
    {
        $komen = comment::where('id_tanya_jawab', $id_artikel)->get();
        $post = artikel::where('id_artikel', $id_artikel)->get();
        return view('artikel.lihat_artikel',compact('post','komen'));
    }

    public function create(Request $request)
    {
        //dari Auth harusnya
        $id_user = Auth::id();

        $comment = new Comment();
        $comment->id_tanya_jawab = $request->id;
        $comment->id_user = $id_user;
        $comment->flag = 1;
        $comment->komentar = $request->message;

        $comment->save();
        return redirect()->back();
        // dd($id_user);
        // return $comment;
    }
}
