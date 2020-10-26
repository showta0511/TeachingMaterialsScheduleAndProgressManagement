<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    
    protected $guarded = array("id","created_at","update_at");

    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
