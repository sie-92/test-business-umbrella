<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class User extends Model
{

    protected $table = 'users';
    
    protected $fillable = ['name'];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_users', 'user_id', 'company_id')->withTimestamps();

    }

}
