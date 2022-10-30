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
    public function index()
    {
        $advertisings = advertisingResource::collection(Advertising::orderBy('id', 'ASC')->get());
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
            return Redirect::route('advertisings.index');
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
        return Redirect::route('advertisings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
