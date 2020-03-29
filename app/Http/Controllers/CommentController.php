<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){

            Comment::create(
                [
                    'content'=>$request->get('content'),
                    'user_id'=>$request->get('user_id'),
                    'commendable_id'=>$request->get('commendable_id'),
                    'commendable_type'=>$request->get('commendable_type')

                    

                 ]);
                 return redirect(action('PageController@show',$request->get('commendable_id')));
    }
}
