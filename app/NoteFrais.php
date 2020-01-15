<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteFrais extends Model
{
    protected $table = "NOTE_DE_FRAIS";
    protected $primaryKey = "ID_NOTE_DE_FRAIS";
    public $timestamps = false;


    protected $fillable = [
       'DATE_DEPOT'
      ];
      public function frais(){
        return $this->hasMany(LignFrais::class, 'ID_NOTE_DE_FRAIS');
    }
}
