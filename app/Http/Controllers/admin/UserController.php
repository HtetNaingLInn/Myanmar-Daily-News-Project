<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    
    {

        $image=$request->file('image');
        $imageName=uniqid().'_'.$image->getClientOriginalName();

        $image->move(\public_path().'/upload/admin_photo/',$imageName);
        // $password=Hash::make($request['password']);
        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request['password']),
            'role'=>$request->get('role'),
            'image'=>$imageName
        ]);
        return \redirect('admin/user')->with('status','Successfully User Added');
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
        $user=User::findOrFail($id);

        return view('admin.user.edit',\compact('user'));
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
            $image=$request->file('image');
            $imageName=\uniqid().'_'.$image->getClientOriginalName();

            $image->move(\public_path().'/upload/admin_photo/',$imageName);
        
        User::findOrfail($id)->update([
            'name'=>$request->get('name'),
            'role'=>$request->get('role'),
            'image'=>$imageName
        ]);
        return \redirect('admin/user')->with('status','Successfully Updated User info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return \redirect('admin/user')->with('status','Deleted Successfuly');
    }
}
