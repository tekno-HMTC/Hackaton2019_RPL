<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        
        foreach($comments as $key => $comment){
            $data =  array(
                'nomor' => $key,
                'id_pertanyaan' => $comment->id_pertanyaan, 
                'id_user' => $comment->id_user, 
                'komentar' => $comment->komentar, 
                'voter' => $comment->jumlah_vote
            );
        }

        return $data;
        // dd($comments[0]->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dari Auth harusnya
        $id_user = Auth::id();

        $comment = new Comment();
        $comment->id_tanya_jawab = 1;
        $comment->id_user = $id_user;
        $comment->flag = 1;
        $comment->komentar = $request['komentar'];

        $comment->save();
        // dd($id_user);
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id = 0)
    {
        try{
            $comment = Comment::find($id);
        }
        catch(Exception $e)
        {
            return 'failed';
        }

        return $comment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->get()[0];
       
        if($request->has('komentar')){
            $comment->komentar = $request->komentar;
        }
        
        if($request->has('jumlah_vote')){
            $comment->jumlah_vote = $request->jumlah_vote;
        }

        $comment->save();

        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);

        $comment->delete();

        return 'success';
    }
}
