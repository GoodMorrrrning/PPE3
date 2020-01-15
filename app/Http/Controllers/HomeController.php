<?php

namespace App\Http\Controllers;
use App\Mission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $id=auth()->id();
        $User = User::find($id);
        if($User->id_role==1){
            return redirect()->route('show', auth()->id()); //si l'user est un visiteur medical on le met sur la liste de ses missions
        }
        else{
            return redirect()->route('homeAdmin', auth()->id());// si c'est un Admin on le revoie sur sa page admin
        }



    }
    public function show()
	{
        $id=auth()->id();

        $value = array($id);
        $details = \App\Mission::find($id);
        $procedure = DB::select('exec AfficheMission ?', array($id));

        return view('show')->with('procedure', $procedure);


    }



}
