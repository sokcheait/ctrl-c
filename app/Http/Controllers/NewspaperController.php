<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Inertia\Inertia;
use App\Models\Newspaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\newspaperResource;

class NewspaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input('search');
        $newspapers = newspaperResource::collection(
                        Newspaper::join('menus', 'menus.id', '=', 'newspapers.menu_id')
                        ->when($input,function($query,$search){
                            $query->where("menus.name","like","%$search%");
                        })
                        ->select('newspapers.*','menus.name')
                        ->orderBy('id', 'ASC')
                        ->paginate(5)
            );
        return Inertia::render('Newspaper/Index',compact('newspapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return Inertia::render('Newspaper/Create',compact('menus'));
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
            'menu_id' =>['required'],
            'title' => ['required','min:3'],
            'des'  => ['required','min:3'],
            'image'=> ['required','image']
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('newspapers');
            Newspaper::create([
                'menu_id' => $request->menu_id,
                'title' => $request->title,
                'des' => $request->des,
                'image' => $image,
                'status' => $request->status
            ]);
            return Redirect::route('newspapers.index')->with('success', 'newspapers created successfully');
        }
        return Redirect::back()->with('error','newspapers create not successfully');
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
    public function edit(Newspaper $newspaper)
    {
        $menus = Menu::all();
        return Inertia::render('Newspaper/Edit',compact('newspaper','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newspaper $newspaper)
    {
        $image = $newspaper->image;
        $request->validate([
            'title' =>['required','min:3'],
            'menu_id' => ['required']
        ]);
        if($request->hasFile('image')){
            Storage::delete($newspaper->image);
            $image = $request->file('image')->store('newspapers');
        }
        $newspaper->update([
            'menu_id'=>$request->menu_id,
            'title'=>$request->title,
            'des'=>$request->des,
            'image'=> $image,
            'status'=> $request->status,
        ]);
        return Redirect::route('newspapers.index')->with('success', 'newspapers update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newspaper $newspaper)
    {
        Storage::delete($newspaper->image);
        $newspaper->delete();
        return Redirect::back()->with('success', 'newspapers delete successfully');
    }
}
