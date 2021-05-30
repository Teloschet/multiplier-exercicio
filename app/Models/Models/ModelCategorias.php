<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCategorias extends Model
{
    protected $table='categorias';
    protected $fillable=['name'];

    public function relUsers() {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
