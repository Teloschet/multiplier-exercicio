<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProdutos extends Model
{
    protected $table='produtos';
    protected $fillable=['categoria_id', 'produto', 'price'];

    public function relUsers() {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
