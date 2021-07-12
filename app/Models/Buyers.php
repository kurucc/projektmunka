<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Buyers extends Authenticatable
{
    use HasFactory;
    protected $table = "buyers";
    protected $fillable = ['username', 'password'];
    public $timestamps = false;
}
