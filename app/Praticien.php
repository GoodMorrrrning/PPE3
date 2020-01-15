<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praticien extends Model
{
    protected $table = "PRACTICIENS";
    protected $primaryKey = "ID_Praticien";
    public $timestamps = false;

    protected $fillable = [
        'ID_Praticien','NOM','ETAT_CIVIL', 'NOTE', 'NOTRIETE', 'MEMBRE_ASSOCIATION', 'DIPLOME'
    ];


}
