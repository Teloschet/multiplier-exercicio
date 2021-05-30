<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $table='users';
    protected $fillable=['name', 'email', 'password', 'remember_token'];

    public function relUsers() {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
