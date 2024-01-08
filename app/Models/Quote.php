<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $fillable = ['autor','quote','user_id'];
}