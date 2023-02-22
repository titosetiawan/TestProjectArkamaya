<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $table = "tb_m_project";
    public $timestamps = false;


    public $fillable = ['project_id', 'project_name', 'client_id', 'project_start', 'project_end', 'project_status'];

    public function client() {
        return $this->belongsTo('App\Models\Client');

    }
}
