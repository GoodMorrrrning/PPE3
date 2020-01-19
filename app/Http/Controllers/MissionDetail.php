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

       // $image = $request->input('Ticketimg');
        $imageCarbu = $request->input('ticketcarbu');
        $imageManger = $request->input('ticketmanger');
        $prixhotel = $request->input('PrixHotel');
        $prixcarbu = $request->input('PrixCarbu');
        $prixManger = $request->input('PrixManger');
        date_default_timezone_set('Europe/Paris');
        $pdate = date('Y-m-d H:i');
       echo gettype($request->input('Ticketimg'));
        $path = $request->file('Ticketimg')->store('public/Test');


      // Storage::disk('local')->put('nique', $fichierFinal);
       // $test->save();
        DB::insert('exec Dfrais ?, ?, ?, ?, ?, ?, ?, ?', array($idMission, $prixhotel, $prixcarbu, $prixManger, $pdate, $path, $imageCarbu, $imageManger));

        return redirect()->action('HomeController@show')->with('succes', 'Frais déclarés');
    }

    public function edit($id)
    {
        $pls = DB::select('exec MemoValue ?', array($id));
        $dec = Mission::find($id);
        return view('PageDeclare', compact('dec', 'pls'));
    }
}
