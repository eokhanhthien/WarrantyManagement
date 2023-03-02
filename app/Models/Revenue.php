<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_revenue';
    protected $fillable = [
        'claim_code' , 'sort' ,'total_money', 'created_at'
    ];
}
