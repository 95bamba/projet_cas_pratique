<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chambre extends Model
{
    use HasFactory;
    protected $fillable= ['id','type','statut','image','bain','tele','capacite','tarif','clim','message','douche','netoyer','toilette','numero','etage'];

}
