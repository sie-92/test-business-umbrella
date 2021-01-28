<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";

    protected $fillable = ['name'];

    //Company is related to just one Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    //Company can be associated with a few users
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id')->withTimestamps();
    }

}
