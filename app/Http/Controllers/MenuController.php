<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\menuResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = menuResource::collection(Menu::orderBy('id', 'ASC')->get());
        return Inertia::render('Menu/Index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Menu/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','min:3'],
            'image'=> ['required','image']
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('menus');
            Menu::create([
                'name' => $request->name,
                'image' => $image,
                'status' => $request->status
            ]);
            return Redirect::route('menus.index');
        }
        return Redirect::back();
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
    public function edit(Menu $menu)
    {
        return Inertia::render('Menu/Edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $image = $menu->image;
        $request->validate([
            'name' =>['required','min:3']
        ]);
        if($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('menus');
        }

        $menu->update([
            'name'=>$request->name,
            'image'=> $image,
            'status'=> $request->status
        ]);
        return Redirect::route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return Redirect::back();
    }
}
