<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingSchedule extends Model
{
    protected $guarded = array("id","created_at","update_at");

    public function Schedule(){
        return $this->hasMany("App\Models\Schedule");
    }
    public function ForTheGoal(){
        return $this->belongsTo("App\Models\ForTheGoal");
    }

    public function teaching_material(){
        return $this->belongsTo("App\Models\TeachingMaterial");
    }
}
