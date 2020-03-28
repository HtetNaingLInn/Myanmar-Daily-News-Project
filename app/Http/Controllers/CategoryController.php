<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $cats=Category::all();
        $cat=Category::FindOrfail($id);
        $posts = $cat->post;

        return view('client.Category.index',compact('cats','posts'));
        
        

    }
}
