<?php

namespace App\Http\Controllers;

use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MissionDetail extends Controller
{
    public function detail($idMission)
    {
        $id = auth()->id();
        $Mdetail = DB::select('exec MissionDetail ?, ?', array($id, $idMission));
        return view('missDetail')->with('missionloop', $Mdetail);
    }
    public function DeclareFrais($idMission, Request $request)
    {
        $prixhotel = $request->input('PrixHotel');
        $prixcarbu = $request->input('PrixCarbu');
        $prixManger = $request->input('PrixManger');
        date_default_timezone_set('Europe/Paris');
        $pdate = date('Y-m-d H:i');

        DB::insert('exec Dfrais ?, ?, ?, ?, ?', array($idMission, $prixhotel, $prixcarbu, $prixManger, $pdate));

        return redirect()->action('HomeController@show')->with('succes', 'Frais déclarés');
    }
    public function edit($id)
    {
        $pls = DB::select('exec MemoValue ?', array($id));
        $dec = Mission::find($id);
        return view('PageDeclare', compact('dec', 'pls'));
    }
}
