<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForTheGoal extends Model
{
    protected $guarded = array("id","created_at","update_at");

    public function schedule(){
        return $this->hasMany("App\Models\Schedule");
    }

    public function goal(){
        return $this->belongsTo("App\Models\Goal");
    }
    public function for_the_goal(){
        return $this->belongsTo("App\Models\ForTheGoal");
    }
}
