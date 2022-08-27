<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_xaphuongthitran';
    protected $fillable = [
        'name_xaphuong' , 'type' , 'maqh'
    ];
}
