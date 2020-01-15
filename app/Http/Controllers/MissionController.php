<?php

namespace App\Http\Controllers;

use App\Mission;
use App\Praticien;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use PHPUnit\Framework\MockObject\Builder\Identity;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       return redirect()->route('homeAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function stored(Request $request, $id)
    {

        $miss = User::find($id);
        $mission = new Mission;
        $mission->NOM =$request->input('NOM');
        $mission->ID_PERSONNELS = $miss->ID_PERSONNELS;
        $mission->ID_NOTE_DE_FRAIS = 31;
        $mission->DATE_MISSION = $request->input('DATE_MISSION');
        $mission->RUE = $request->input('RUE');
        $mission->VILLE = $request->input('VILLE');
        $mission->DescriptionMission = $request->input('DescriptionMission');
        //-----------------------------------------------------------------------------------------
        $idprat = Praticien::select('ID_Praticien')->where('NOM',$request->input('ID_Praticien'))->get();// on récupere l'ID praticien grace a  une requete du style :
     // select id_praticien from praticien where NomPraticien = "le champ rentré"
        $mission->ID_Praticien = $idprat[0]->ID_Praticien;//si plusieurs ont le meme nom on prend le premier
        //--------------------------------------------------------------------------------------
        $mission->save();
        return redirect()->action('AdminController@index')->with('succes', 'Mission Ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
