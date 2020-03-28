<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($id){
        $cat=Category::findOrfail($id);
        dd($cat->post);
    }
}
