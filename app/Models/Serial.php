<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_serial';
    protected $fillable = [
        'id_product' , 'status' , 'serial_number','warranty_time','activate_time','expired_time'
    ];
}
