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
        $prixhotel = $request->input('PrixHotel');
        $prixcarbu = $request->input('PrixCarbu');
        $PrixRestauration = $request->input('PrixRestauration');
        date_default_timezone_set('Europe/Paris');
        $pdate = date('Y-m-d H:i');

        $ImgData = DB::select('exec getImageFrais ?', array($idMission));

        //----Get urls-----------------------------//


        // on regarde si le input contien un fichier
        if($request->hasFile('TicketHotel')==true){
            // si oui on enregistre le nouveau fichier
        $ImageHotel = $request->file('TicketHotel')->store('public/Tickets');
        $url = Storage::url($ImageHotel);
        }
        //sinon on re enregistre celui qu'il a déja
        else{
            foreach($ImgData as $ticket){
                $url = $ticket->TicketHotel;
            }
        }
        if($request->hasFile('ticketcarbu')==true){
            $CarbuImg = $request->file('ticketcarbu')->store('public/Tickets');
            $urlCarbu = Storage::url($CarbuImg);
        }
        else{
            foreach($ImgData as $ticket){
                $urlCarbu = $ticket->TicketCarbu;
            }
        }
        if($request->hasFile('ticketmanger')==true){
            $MangerImg = $request->file('ticketmanger')->store('public/Tickets');
            $urlManger = Storage::url($MangerImg);
        }
        else{
            foreach($ImgData as $ticket){
                $urlRestauration = $ticket->TicketManger;
            }
        }
        //------------------------------------------//
        DB::insert('exec Dfrais ?, ?, ?, ?, ?, ?, ?, ?', array($idMission, $prixhotel, $prixcarbu, $PrixRestauration, $pdate, $url, $urlCarbu, $urlRestauration));
        return redirect()->action('HomeController@show')->with('succes', 'Frais déclarés');
    }

    public function edit($id)
    {
        $ImgData = DB::select('SELECT dbo.MISSION.ID_MISSION,
        Type_Frais_2.Ticketimg AS TicketManger,
         Type_Frais_1.Ticketimg AS TicketCarbu,
          dbo.Type_Frais.Ticketimg AS TicketHotel
       FROM            dbo.MISSION INNER JOIN
                                dbo.NOTE_DE_FRAIS ON dbo.MISSION.ID_NOTE_DE_FRAIS = dbo.NOTE_DE_FRAIS.ID_Note_de_frais INNER JOIN
                                dbo.Type_Frais ON dbo.NOTE_DE_FRAIS.ID_Note_de_frais = dbo.Type_Frais.ID_Notede_frais INNER JOIN
                                dbo.Type_Frais AS Type_Frais_1 ON dbo.NOTE_DE_FRAIS.ID_Note_de_frais = Type_Frais_1.ID_Notede_frais INNER JOIN
                                dbo.Type_Frais AS Type_Frais_2 ON dbo.NOTE_DE_FRAIS.ID_Note_de_frais = Type_Frais_2.ID_Notede_frais
       WHERE        (dbo.MISSION.ID_MISSION = ?) AND (dbo.Type_Frais.NomType = ?) AND (Type_Frais_1.NomType = ?) AND (Type_Frais_2.NomType = ?)', array($id, 'hotel', 'carburant', 'manger'));
    foreach($ImgData as $req){
        $hotel = $req->TicketHotel;
        $carbu = $req->TicketCarbu;
        $manger = $req->TicketManger;
    }


        $pls = DB::select('exec MemoValue ?', array($id));
        $dec = Mission::find($id);
        return view('PageDeclare', compact('dec', 'pls'))->with('ImgData', array($hotel, $carbu, $manger));
    }
}
