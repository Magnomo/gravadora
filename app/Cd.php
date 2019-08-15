<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cd extends Model
{
    protected $table = "cd";

    protected $fillable = ['titulo', 'quantidade_musicas', 'preco', 'artista', 'gravadora_id'];

    public function gravadora()
    {
        return $this->belongsTo('App\Gravadora');
    }
}
