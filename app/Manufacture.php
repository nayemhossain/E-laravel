<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $table = 'tbl_manufacture';

    public function product(){

    return	$this->hasMany('App\Product');
    }
}
