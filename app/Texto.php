<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = "textos";
    protected $fillable = ['id','descricao', 'user_id'];

    public function User_id(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
