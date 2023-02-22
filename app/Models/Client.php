<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Client extends Model
{
    use HasFactory;
    public $table = "tb_m_client";
    public $timestamps = false;
    
    public $fillable = ['client_id', 'client_name', 'client_addres'];

}
