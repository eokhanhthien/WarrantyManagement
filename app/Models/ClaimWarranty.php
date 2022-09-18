<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimWarranty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_claim_warranty';
    protected $fillable = [
        'customer_name' , 'customer_email' , 'customer_phone' , 'product_serial' , 'product_id' , 'address_city' , 'address_province' , 'address_wards' , 'status' , '	created_at' , 
    ];
}
