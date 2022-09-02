<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_order_detail';
    protected $fillable = [
        'order_code', 'product_id','product_name','product_serial','product_price','product_image'
    ];
}
