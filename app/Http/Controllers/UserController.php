<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('admin.users.indexUser',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avatars=Avatar::all();

        return view('admin.users.createUser',compact('avatars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation=$request->validate([
            "name"=>'required',
            "email"=>'required',
            "age"=>'required',
            "avatar_id"=>'required',
            "password"=>'required',
        ]);


        $store=new User;

        $store->name=$request->name;
        $store->email=$request->email;
        $store->age=$request->age;
        $store->avatar_id=$request->avatar_id;
        $store->password=Hash::make($request['password']);

        $store->save();

        return redirect('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avatar=Avatar::all();

        $show=User::find($id);
        return view('admin.users.showUser',compact('show','avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit= User::find($id);
        $avatars=Avatar::all();
        return view('admin.users.editUser',compact('edit','avatars'));
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
        $validation=$request->validate([
            "name"=>'required',
            "email"=>'required',
            "age"=>'required',
            "avatar_id"=>'required',
            "password"=>'required',
        ]);
        
        $update= User::find($id);

        $update->name=$request->name;
        $update->age=$request->age;
        $update->email=$request->email;
        $update->avatar_id=$request->avatar_id;

        $update->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy= User::find($id);

        $destroy->delete();

        return redirect('/users');
    }
}
