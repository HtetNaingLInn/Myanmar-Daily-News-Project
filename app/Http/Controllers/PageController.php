<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    {    
       if(\request('search')){
            $posts=Post::where('title','like','%'.\request('search').'%')->orderby('id','desc')->paginate(10);
       }else{
             $posts=Post::orderby('id','desc')->paginate(10);
       }

        $cats=Category::all();
            
        

        return view('client.home.index',\compact('posts','cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats=Category::all();
       
        $post=Post::findOrfail($id);
        $comments =$post->comment;

        return view('client.view_detail',compact('post','cats','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function about(){
        $cats=Category::all();

        return view('client.about.index',compact('cats'));
    }

    public function Contact(){
        $cats=Category::all();

        return view('client.contact.index',compact('cats'));
    }
}
