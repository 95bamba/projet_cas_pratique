<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $fillable= ['id','nom','datedeb','datefin','heur','email','choix','message','phone','client','chambre'];

}
