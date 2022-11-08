<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return Inertia::render('Setting/Index',compact('settings'));
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
            'address' => ['required','min:3'],
            'phone_number' => ['required','min:9'],
            'about' => ['required','min:3'],
            'image'=> ['required','image'],
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('settings');
            Setting::create([
                'address' => $request->address,
                'about' => $request->about,
                'phone_number' => $request->phone_number,
                'image' => $image,
            ]);
            return Redirect::route('settings.index')->with('success', 'Setting created successfully');    
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
    public function edit(Setting $setting)
    {
        // return Inertia::render('Setting/Index',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $image = $setting->image;
        $request->validate([
            'address' => ['required','min:3'],
            'phone_number' => ['required','min:9'],
            'about' => ['required','min:3'],
        ]);
        if($request->hasFile('image')){
            Storage::delete($setting->image);
            $image = $request->file('image')->store('settings');
        }
        $setting->update([
            'address' => $request->address,
            'about' => $request->about,
            'phone_number' => $request->phone_number,
            'image' => $image,
        ]);
        return Redirect::route('settings.index')->with('success', 'Setting Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        Storage::delete($setting->image);
        $setting->delete();
        return Redirect::back()->with('success', 'setting delete successfully');
    }
}
