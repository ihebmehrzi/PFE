<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    protected $fillable = ['permis_conduire','date_délivran','adress_actuelle'];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }


}
