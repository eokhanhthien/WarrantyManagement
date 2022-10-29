<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_job_employee_detail';
    protected $fillable = [
        'repair', 'note' ,
    ];
}
