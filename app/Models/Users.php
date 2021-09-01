<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
