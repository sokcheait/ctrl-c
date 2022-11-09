<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Inertia\Inertia;
use App\Models\Social;
use App\Models\Newspaper;
use Illuminate\Http\Request;
use App\Http\Resources\newspaperResource;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $menus = Menu::all();
        $newspapers = newspaperResource::collection(
                        Newspaper::join('menus', 'menus.id', '=', 'newspapers.menu_id')
                        ->select('newspapers.*','menus.name')
                        ->orderBy('id', 'DESC')
                        ->get()
            );
        return Inertia::render('Home',compact('menus','newspapers'));
    }

    public function accountLogin()
    {
        return Inertia::render('Account/Login');
    }

    public function accountResigter()
    {
        $socials = Social::all();
        return Inertia::render('Account/Resigter',compact('socials'));
    }

}
