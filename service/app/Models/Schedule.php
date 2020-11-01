<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function User(){
        return $this->belongsTo("App\Models\User");
    }

    public function SettingSchedule(){
        return $this->belongsTo("App\Models\SettingSchedule");
    }
}
