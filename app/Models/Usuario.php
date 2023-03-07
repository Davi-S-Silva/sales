<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $table = 'usuarios';
    
    // protected $fillable = ['id', 'nome', 'login', 'senha', 'nivel_acesso', 'situacao_acesso','created_at', 'updated_at'];
   
    private function getLastId(){
        return Usuario::select('id')->get()->count();
    }

    public function newId(){
        return $this->getLastId()+1;
    }

}
