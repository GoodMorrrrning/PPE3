<?php

namespace App\Http\Controllers;

use App\Mission;
use App\Praticien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class PratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListePraticien = Praticien::all();
         return view('ListeDesPraticiens')->with('ListePraticien', $ListePraticien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('AjoutePraticien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $Ajoutprat = new Praticien;

       $Ajoutprat->NOM = $request->input('NOM');
       $Ajoutprat->ETAT_CIVIL = $request->input('ETAT_CIVIL');
       $Ajoutprat->NOTE = $request->input('NOTE');
       $Ajoutprat->NOTORIETE = $request->input('NOTORIETE');
       $Ajoutprat->MENBRE_ASSOCIATION = $request->input('MEMBRE_ASSOCIATION');
       $Ajoutprat->DIPLOME = $request->input('DIPLOME');
       $Ajoutprat->save();
        return redirect()->route('prat.index');
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
        $ModificationMode = 0;
        $DataPraticien = \App\Praticien::find($id);
        return view('AjoutePraticien', compact('DataPraticien'))->with('ModificationMode', $ModificationMode);
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
      $ModifPrat= Praticien::find($id);

      $ModifPrat->NOM = $request->input('NOM');
      $ModifPrat->ETAT_CIVIL = $request->input('ETAT_CIVIL');
      $ModifPrat->NOTE = $request->input('NOTE');
      $ModifPrat->NOTORIETE = $request->input('NOTORIETE');
      $ModifPrat->MENBRE_ASSOCIATION = $request->input('MEMBRE_ASSOCIATION');
      $ModifPrat->DIPLOME = $request->input('DIPLOME');
      $ModifPrat->save();
       return redirect()->route('prat.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $DelPrat = Praticien::find($id);
        $TestDelete = DB::table('MISSION')->where('ID_Praticien', $id)->get();
        $TestDelete->ID_MISSION = (array) $TestDelete;
        //on regarde si il a plus de 0 mission, si c'est le cas on envoie une erreur
        if (count($TestDelete) > 0) {
           return redirect()->route('prat.index')->withErrors('Erreur : Ce Praticien est Affecté à une Mission et ne Peut pas etre Supprimé !');
            var_dump(count($TestDelete));
        } else {
            $DelPrat->delete();
            return redirect()->route('prat.index')->with('succes', 'Le Praticien a été supprimé avec succes');
        }
    }
}
