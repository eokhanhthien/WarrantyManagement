<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_user';
    protected $fillable = [
        'fullname','username' , 'password','email' , 'role' 
    ];
    
}
