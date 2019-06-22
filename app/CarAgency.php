<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarAgency extends Model
{
    protected $fillable = [
        'v_matricule', 'kilometrage', 'couleur','prix','photo','disponibilite','description','marque_id'

        ];
    protected  $table ='car_agencies';

    public function marques(){

       return $this->belongsTo(Marque::class,'marque_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}
