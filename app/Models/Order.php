<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $fillable = [
        'order_number', 
        'user_id',
        'direction',
        'net_sum',
        'gross_sum',
        'VAT_sum',
        'delivered',
        'invoice_id'
    ];
}
