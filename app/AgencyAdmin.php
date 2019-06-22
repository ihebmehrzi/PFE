<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgencyAdmin extends User
{
    protected $fillable = ['matricul_agence','nom_agence','fax',];
    protected  $table ='agency_admins';

}
