<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Praticien;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        new Praticien();

        $id = auth()->id();
        $prat = Praticien::all();
        $users = User::all();
        return view('homeAdmin')->with('users', $users)->with('praticiens', $prat);
    }
    public function FraisUser($id)
    {
        $fraisUser = DB::select('exec affichefrais ?', array($id));
        $thisuser = User::find($id);
        return view('listefrais')->with('fraiss', $fraisUser)->with('users', $thisuser);
    }
}
