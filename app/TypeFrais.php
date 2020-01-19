<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFrais extends Model
{

    protected $table = "Type_Frais";
    protected $primaryKey = "ID_Type_Frais";
    public $timestamps = false;


    protected $fillable = [
       'NomType', 'Montant', 'ID_Notede_frais', 'Ticketimg'
      ];

      public function TypeFraisDepend(){
        return $this->belongsTo(LignFrais::class, 'TYPE_DE_FRAIS');
    }
}
