<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_order';
    protected $fillable = [
        'order_code', 'name_customer','phone_customer','email_customer','address_city','address_province','address_wards','note','created_at'
    ];
}
