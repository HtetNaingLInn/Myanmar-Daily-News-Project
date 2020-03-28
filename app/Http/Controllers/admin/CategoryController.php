<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('search'))
        {
            $cats=Category::where( 'name', 'like' , '%'. \request('search') .'%' );
        }
        else
        {
            $cats=Category::all();
        }
        
        return view('admin.category.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name'=>$request->get('name'),
            'description'=>$request->get('description')
        ]);
        return redirect('admin/category/create')->with('status','Successfully Created');
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
        $cat=Category::findOrFail($id);
        return view('admin.category.edit',\compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // $cat=Category::findOrFail($id);
        // $cat->name=$request->get('name');
        // $cat->description=$request->get('description');
        // $cat->update();

        Category::findOrFail($id)->update
        ([
            'name'=>$request->get('name'),
            'description'=>$request->get('description')
        ]);

        return redirect('admin/category')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return \redirect('admin/category')->with('status','Successfully Deleted');
    }
}
