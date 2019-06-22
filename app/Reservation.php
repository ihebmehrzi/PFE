<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'nom','prenom','date_pris_en_charge','date_fin_reservation','tel','email','client_id','car_id'
    ];

    public function clients(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function cars(){

        return $this->belongsTo(CarAgency::class,'car_id');
    }

}
