<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFrais extends Model
{
  
    protected $table = "TYPE_DE_FRAIS";
    protected $primaryKey = "ID_TYPE_DE_FRAIS";
    public $timestamps = false;


    protected $fillable = [
       'LIBELLE', 'PLAFOND'
      ];

      public function TypeFraisDepend(){
        return $this->belongsTo(LignFrais::class, 'TYPE_DE_FRAIS');
    }
}
