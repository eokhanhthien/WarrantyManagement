<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEmployee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_job_employee';
    protected $fillable = [
        'id_technician', 'order_code' , 'created_at' 
    ];
}
