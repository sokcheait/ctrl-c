<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\advertisingResource;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input('search');
        $advertisings = advertisingResource::collection(
            Advertising::when($input,function($query,$search){
                            $query->where("status","like","%$search%");
                        })
                        ->select('advertisings.*')
                        ->orderBy('id', 'ASC')
                        ->paginate(5)
            );
        return Inertia::render('Advertising/Index',compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Advertising/Create');
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
            'location'=> ['required'],
            'image'=> ['required','image'],
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('advertisings');
            Advertising::create([
                'ads_url' => $request->ads_url,
                'location' => $request->location,
                'image' => $image,
                'status' => $request->status
            ]);
            return Redirect::route('advertisings.index')->with('success', 'advertising created successfully');
        }
        return Redirect::back()->with('error','advertising create not successfully');
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
    public function edit(Advertising $advertising)
    {
        return Inertia::render('Advertising/Edit',compact('advertising'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertising $advertising)
    {
        $image = $advertising->image;
        $request->validate([
            'location' =>['required']
        ]);
        if($request->hasFile('image')){
            Storage::delete($advertising->image);
            $image = $request->file('image')->store('advertisings');
        }

        $advertising->update([
            'ads_url' => $request->ads_url,
            'location' => $request->location,
            'image'=> $image,
            'status'=> $request->status
        ]);
        return Redirect::route('advertisings.index')->with('success', 'advertising update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        Storage::delete($advertising->image);
        $advertising->delete();
        return Redirect::back()->with('success', 'advertising delete successfully');
    }
}
