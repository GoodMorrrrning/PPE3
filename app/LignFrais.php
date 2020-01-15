<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LignFrais extends Model
{
    protected $table = "LIGNE_DE_FRAIS";
    protected $primaryKey = "ID_LIGNE_DE_FRAIS";
    public $timestamps = false;


    protected $fillable = [
       'MISSION','QUANTITE'
      ];
      public function ligneFrais(){
        return $this->hasMany(TypeFrais::class, 'ID_LIGNE_DE_FRAIS');
    }
    public function ligneDependDe(){
        return $this->belongsTo(NoteFrais::class, 'ID_LIGNE_DE_FRAIS');
    }
}
