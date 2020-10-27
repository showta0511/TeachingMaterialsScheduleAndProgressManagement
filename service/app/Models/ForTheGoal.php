<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForTheGoal extends Model
{
    protected $guarded = array("id","created_at","update_at");

    public function goal(){
        return $this->belongsTo("App\Models\Goal");
    }
}
