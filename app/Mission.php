<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = "MISSION";
    protected $primaryKey = "ID_MISSION";
    public $timestamps = false;


    protected $fillable = [
        'ID_MISSION', 'ID_PERSONNEL', 'NOM', 'DATE_MISSION'
      ];


}
