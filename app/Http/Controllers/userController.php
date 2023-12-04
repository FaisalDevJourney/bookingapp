<?php

namespace App\Http\Controllers;

use App\Models\user;

use App\Models\wallet;
use App\Models\insturctor;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        try {
            $newuser = user::create($user);
            wallet::create([
                'user_id' => $newuser->id,
                'amount' => 0
            ]);
        } catch (\Throwable $th) {
            $error = response($th, 500)->json();
        }

        return redirect("/");
    }

    public function login(Request $request)
    {

        $user = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect('/')->withSuccess('You have successfully logged in!');
        }elseif(Auth::attempt(['email'=>$request->name, 'password'=>$request->password])){
            $request->session()->regenerate();
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function topup(Request $request)
    {
        $info = $request->validate([
            'name' => 'required',
            'cardnum' => 'required',
            'CVV' => 'required',
            'expiry' => 'required',
            'amount' => 'required'
        ]);

        $wallet = wallet::find(Auth::user()->wallet->user_id);

        $topup = $wallet->amount + $request->amount;
        $wallet->amount = $topup;
        $wallet->save();
        transaction::create([
            'wallet_id'=>Auth::user()->wallet->id,
            'status'=>'success',
            'description'=>'Topup processed',
            'amount'=>$request->amount,
        ]);

        return redirect("/");
        
        
    }
}
