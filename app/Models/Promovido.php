<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ocupacion;

class Promovido extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'promovidos';

    public function lideres(){
        return $this->belongsTo(User::class,'id_usuario');
    }
    public function ocupaciones(){
        return $this->belongsTo(Ocupacion::class,'id_ocupacion');
    }

    public function secciones(){
        return $this->belongsTo(seccion::class,'id_seccion');
    }

    public function observaciones(){
        return $this->belongsToMany('App\Models\Observacion');
    }
}
