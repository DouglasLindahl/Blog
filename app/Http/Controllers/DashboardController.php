<?php


namespace App\Http\Controllers;

use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        return view('/dashboard', ["user" => $user]);
    }
}
