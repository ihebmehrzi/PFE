<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['id_model','nom_model','marque_id'];


    public function marqueModel(){

        return $this->belongsTo(Marque::class,'marque_id');
    }
}
