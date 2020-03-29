<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('search')){
            $posts=Post::where('title','like','%'.\request('search') .'%')
            ->orderby('id','desc')->paginate(6);
        }else{
            $posts=Post::orderby('id','desc')->paginate(6);
        }
        
        return view('admin.post.index',\compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats =Category::all();
        return view('admin.post.create',\compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image=$request->file('image');

        $imageName=uniqid().'_'.$image->getClientOriginalName();

        $image->move(\public_path().'/upload/',$imageName);



        Post::create([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'image'=> $imageName,
            'link'=>$request->get('link'),
            'category_id'=>$request->get('category_id')
        ]);
        return \redirect('admin/post/create')->with('status','Successfuly Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=Category::all();
        $post=Post::findOrFail($id);
        return view('admin.post.edit',\compact('cats','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $image=$request->file('image');

        $imageName=uniqid().'_'.$image->getClientOriginalName();

        $image->move(\public_path().'/upload/',$imageName);


        Post::FindOrFail($id)->update([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'image'=> $imageName,
            'link'=>$request->get('link'),
            'category_id'=>$request->get('category_id')
        ]);
        return \redirect('admin/post')->with('status','Successfuly Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return \redirect('admin/post')->with('status','Deleted Successfully');
    }

    public function detail($id)
    {
       $post=Post::findOrfail($id);

       return view('admin.post.detail',compact('post'));
       
    }
}
