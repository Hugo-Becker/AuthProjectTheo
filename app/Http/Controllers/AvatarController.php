<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatars = Avatar::all();
        return view('admin.avatars.indexAvatar', compact('avatars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.avatars.createAvatar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "name" => 'required',
            "avatar_url" => 'required'
        ]);

        $store = new Avatar;
        $store->name = $request->name;
        Storage::put('public/img', $request->avatar_url);
        $store->avatar_url = $request->file('avatar_url')->hashName();
        $store->save();
        return redirect('/avatars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function show(Avatar $avatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Avatar::find($id);
        return view('admin.avatars.editAvatar', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "name" => 'required',
            "avatar_url" => 'required'
        ]);

        $update = Avatar::find($id);
        $update->name = $request->name;
        Storage::delete('public/img/'.$update->avatar_url);
        Storage::put('public/img', $request->avatar_url);
        $update->avatar_url = $request->file('avatar_url')->hashName();
        $update->save();
        return redirect('/avatars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Avatar::find($id);
        // $user = DB::table('users')->where('avatar_id', $id);
        Storage::delete('public/img'.$destroy->avatar_url);
        // dd($user);
        // foreach ($user as $item) {
        //     $item->avatar_id = 1;
        //     $item->save();
        // }
        // $user[0]->save();
        $destroy->delete();
        return redirect()->back();
    }
}
