<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairService extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_repair_service';
    protected $fillable = [
        'name', 'price' 
    ];
}
