<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimWarrantyDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_claim_warranty_detail';
    protected $fillable = [
        'claim_code','customer_name' , 'customer_email' , 'customer_phone' , 'product_serial' , 'product_id' , 'address_city' , 'address_province' , 'address_wards' , 
    ];
}
