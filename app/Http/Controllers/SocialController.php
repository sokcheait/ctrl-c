<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $input = $request->input('search');
        $socials = Social::when($input,function($query,$search){
                            $query->where("name","like","%$search%");
                        })
                        ->select('socials.*')
                        ->orderBy('id', 'ASC')
                        ->paginate(7);

        return Inertia::render('Social/Index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $image = $request->file('image')->store('socials');
            Social::create([
                'name' => $request->name,
                'image' => $image,
            ]);
            return Redirect::route('socials.index')->with('success', 'Social created successfully');
        }
        return Redirect::back()->with('error','Social create not successfully');
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
    public function edit(Social $social)
    {
        return Inertia::render('Social/Index',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        $image = $social->image;
        $request->validate([
            'name' =>['required','min:3']
        ]);
        if($request->hasFile('image')){
            Storage::delete($social->image);
            $image = $request->file('image')->store('socials');
        }

        $social->update([
            'name'=>$request->name,
            'image'=> $image,
        ]);
        return Redirect::route('socials.index')->with('success', 'social update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        Storage::delete($social->image);
        $social->delete();
        return Redirect::back()->with('success', 'social delete successfully');
    }
}
