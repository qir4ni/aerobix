<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;

class WorkoutSession extends Model
{
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
