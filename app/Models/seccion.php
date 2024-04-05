<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seccion extends Model
{
    use HasFactory;
    protected $table = 'secciones';
    public function promovidos(){
        return $this->hasMany('App\Models\Promovido','id_seccion');
    }
}
