<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'id_maintenance', 'desc_maintenance','date_deb_maintenance','date_fin_maintenance','montant_maintenance',
    ];
}
