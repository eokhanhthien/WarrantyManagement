<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCustomerRegister extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_info_customer_register';
    protected $fillable = [
        'customer_name' , 'customer_email','customer_phone','order_code','product_id','product_serial'
    ];
}
