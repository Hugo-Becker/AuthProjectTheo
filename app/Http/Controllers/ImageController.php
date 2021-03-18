<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('admin.images.indexImage', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.images.createImage', compact('categories'));
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
            "image_url" => 'required',
            "category_id" => 'required'
        ]);
        
        $store = new Image;
        Storage::put('public/img', $request->image_url);
        $store->image_url = $request->file('image_url')->hashName();
        $store->category_id = $request->category_id;
        $store->save();
        return redirect('/images');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Image::find($id);
        return view('admin.images.showImage', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $edit = Image::find($id);
        return view('admin.images.editImage', compact('edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "image_url" => 'required',
            "category_id" => 'required'
        ]);

        $update = Image::find($id);
        Storage::delete('public/img/'.$update->image_url);
        Storage::put('public/img', $request->image_url);
        $update->image_url = $request->file('image_url')->hashName();
        $update->category_id = $request->category_id;
        $update->save();
        return redirect('/images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Image::find($id);
        Storage::delete('public/img/'.$destroy->image_url);
        $destroy->delete();
        return redirect('/images');
    }

    public function downloadIMG($id)
    {
        $down = Image::find($id);
        return Storage::download('public/img/'.$down->image_url);
    }
}
