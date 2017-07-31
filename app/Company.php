<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable=['company','sortcompany'];

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
