<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Social;
use App\Models\Socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('SocialMedia/Index');
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
            'social_id' => ['required'],
            'name' => ['required','min:3'],
            'email'=> ['required','email'],
            'password'=> ['required','min:8'],
        ]);
        Socialmedia::create([
            'social_id' => $request->social_id,
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);
        return Redirect::route('/account/login')->with('success', 'account created successfully');
    }

    public function mediaLogin(Request $request)
    {
        $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required','min:8'],
        ]);
        $socialmedia = Socialmedia::where('email','=',$request->email)->first();

        if(Hash::check($request->password, $socialmedia->password)){
            $request->session()->put('loginId',$socialmedia->id);
            if($socialmedia->social_id){
                return Redirect::route('/account/show');
            }
        }
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
        //
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
        //
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
