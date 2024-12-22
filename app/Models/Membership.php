<?php

namespace App\Models;

use App\Enums\MembershipTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'membership_type' => MembershipTypeEnum::class,
        ];
    }
}