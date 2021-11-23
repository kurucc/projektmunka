<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Calculations extends Authenticatable
{
    use HasFactory;
    protected $table = "calculations";
    protected $fillable = ['buyer_id', 'product_id','width', 'length', 'height', 'calculated_price'];
    public $timestamps = false;
}
