<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Dealing;
use App\Rating;
use App\Exchange;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth()->User()->id;
        $comment->exchange_id = $request->canje_id;
        if($request->replyto)
        {
            $comment->replyto = $request->replyto;
        }
        $comment->save();

        return $comment;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function newComment(Request $request)
    {
        $canje = Exchange::find($request->canje_id);
        $this->create($request);
        return view('content.comments', compact('canje'));
    }

    public function updateCommentsView(Request $request)
    {
        $canje = Exchange::find($request->canje_id);
        return view('content.comments', compact('canje'));
    }

    public function valorar(Request $request)
    {
        $this->create($request);
        $this->markCommentDealing($request);
        return $this->rating($request);
    }

    public function rating(Request $request)
    {
        $canje = Exchange::find($request->canje_id);

        $user_id = $canje->talent->user_id;

        $rating = new Rating();
        $rating->value = $request->rating;
        $rating->evaluator_id = auth()->user()->id;
        $rating->evaluated_id = $user_id;
        $rating->save();
        return $rating;
    }

    public function markCommentDealing(Request $request)
    {
        $trato = Dealing::find($request->trato_id);
        if($request->type == 'solicitado')
        {
            $trato->dealing_ready = 2;
        }else
        {
            $trato->proposal_ready = 2;
        }
        $trato->save();
        dd($trato);
        return $trato;
    }

}
