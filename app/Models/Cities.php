<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cities extends Authenticatable
{
    use HasFactory;
    protected $table = "cities";
    protected $fillable = ['zip_code', 'city_name', 'long_coord', 'lang_coord'];
    public $timestamps = false;
}
