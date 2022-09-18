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
        'claim_code' , 'customer_name', 'status','created_at'
    ];
}
