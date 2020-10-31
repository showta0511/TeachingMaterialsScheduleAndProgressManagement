<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingMaterial extends Model
{
    protected $guarded = array("id","created_at","update_at");

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function for_the_goal(){
        return $this->hasMany("App\Models\ForTheGoal");
    }
}
