<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class RegisterAccountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            "password" => 'required|string|min:3|'
        ]);
        $account = $request->only("username", "password");

        try {
            User::create(["username" => $account["username"], "password" => hash::Make($account["password"])]);
            return redirect('/');
        } catch (QueryException $e) {
            return back()->withErrors([
                "username" => "That username is taken"
            ])->onlyInput('username');
        }
    }
}
