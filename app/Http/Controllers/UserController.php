<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleUser;
use App\Mission;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleUser $request)
    {
        $validatedData = $request->validated([
            'NOM' => 'required|min:2|max:255|bail',
            'PRENOM' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = \App\User::find($id);
        return redirect()->route('show', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = \App\User::find($id);
        return view('user.UserEdit', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, RuleUser $requested)
    {

        $details = \App\User::find($id);
        if ($request->input('password') == $request->input('password-confirm') && $request->input('password') != '' && $request->input('password-confirm') != '') {
            $details->password = $request->input('password');
            $details->password = Hash::make($details['password']);
        } else if ($request->input('password') == '' && $request->input('password-confirm') == '') {

            //il se passe rien mdr

        } else {
            return redirect()->action('UserController@edit', $id)->withErrors('Mot de passe diférents');
        }

        $membre = auth()->user();

        $details->MATRICULE = $request->input('MATRICULE');
        $details->NOM = $request->input('NOM');
        $details->PRENOM = $request->input('PRENOM');
        $details->RUE = $request->input('RUE');
        $details->CP = $request->input('CP');
        $details->VILLE = $request->input('VILLE');
        $details->email = $request->input('email');

        // $details->id_membre = $membre->id_membre;

        $details->save();
        return redirect()->route('user.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $GetIdMission = DB::table('MISSION')->where('ID_PERSONNELS', $id)->pluck('ID_MISSION');// on récupere la liste des ID_Mission a supprimer
        //var_dump($GetIdMission); Debogage
        foreach($GetIdMission as $plslord){ // on fait un for qui va s'effectuer autant de fois qu'il y a de mission a supprimer
            //echo$plslord; Debogage
            $Delmiss = Mission::find($plslord);// création d'une variable qui prend une mission grace a l'id Mission trouvé plus haut
            $Delmiss->delete();// on l'a supprime car une mission doit avoir au moins un personnel
        }



        $miss = \App\User::find($id);
        $miss->delete();// on supprime le personnel
        return redirect()->route('homeAdmin');
    }
}
