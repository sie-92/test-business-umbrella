<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'pdf';

    protected $fillable = ['name','size','file'];
}
