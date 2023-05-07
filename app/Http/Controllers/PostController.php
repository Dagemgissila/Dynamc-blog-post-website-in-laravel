<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::query()
        ->where('active','=',1)
        ->where('published_at','!=',NULL)
        ->orderBy('published_at','desc')
        ->paginate(2);

        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        if(!$post->active || $post->published_at >Carbon::now() ){
            throw new NotFoundHttpException();
        }

        $next=Post::query()
        ->where('active',true)
        ->whereDate('published_at','<',Carbon::now())
        ->whereDate('published_at','<',$post->published_at)
        ->orderBy('published_at','desc')
        ->limit(1)
        ->first();

        $pre=Post::query()
        ->where('active',true)
        ->whereDate('published_at','<',Carbon::now())
        ->whereDate('published_at','>',$post->published_at)
        ->orderBy('published_at','asc')
        ->limit(1)
        ->first();

        return view('post.view',compact('post','pre','next'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
