<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $fillable = [
        'id_marque', 'nom_marque',
    ];

    public function cars(){
        return $this->hasMany(CarAgency::class);
    }


    public function models(){
        return $this->hasMany(CarModel::class);
    }

}
