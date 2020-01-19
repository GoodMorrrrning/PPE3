<?php

namespace App\Http\Controllers;

use App\Mission;
use App\TypeFrais;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Faker\Provider\Image;
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


        $imageCarbu = $request->input('ticketcarbu');
        $imageManger = $request->input('ticketmanger');
        $prixhotel = $request->input('PrixHotel');
        $prixcarbu = $request->input('PrixCarbu');
        $prixManger = $request->input('PrixManger');
        date_default_timezone_set('Europe/Paris');
        $pdate = date('Y-m-d H:i');
        //----Get urls-----------------------------//
        $ImageHotel = $request->file('Ticketimg')->store('public/Tickets');
        $url = Storage::url($ImageHotel);

        $CarbuImg = $request->file('ticketcarbu')->store('public/Tickets');
        $urlCarbu = Storage::url($CarbuImg);

        $MangerImg = $request->file('ticketmanger')->store('public/Tickets');
        $urlManger = Storage::url($MangerImg);

        DB::insert('exec Dfrais ?, ?, ?, ?, ?, ?, ?, ?', array($idMission, $prixhotel, $prixcarbu, $prixManger, $pdate, $url, $urlCarbu, $urlManger));
        return redirect()->action('HomeController@show')->with('succes', 'Frais déclarés');
    }

    public function edit($id)
    {
        $pls = DB::select('exec MemoValue ?', array($id));
        $dec = Mission::find($id);
        return view('PageDeclare', compact('dec', 'pls'));
    }
}
