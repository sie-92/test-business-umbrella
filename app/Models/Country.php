<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

    protected $fillable = ['name'];

    public $timestamps = false;

    //Company is related to just one Country
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
