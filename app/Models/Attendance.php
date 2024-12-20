<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutSession;

class Attendance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workout_session()
    {
        return $this->belongsTo(WorkoutSession::class);
    }
}
