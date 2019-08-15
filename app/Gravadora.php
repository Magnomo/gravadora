<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gravadora extends Model
{
    protected $table = "gravadora";
    use SoftDeletes;

    protected $fillable = ['nome', 'cnpj'];

    public function cd()
    {
        return $this->hasMany('App\Cd');
    }
}
