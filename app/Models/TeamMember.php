<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_owner_id',
        'activitytime1',
        'activitytime2',
        'comment',
        'address1',
        'address2',
        'voicechat',
    ];

    public function team_owner()
    {

        return $this->belongsTo(Team_owner::class);
    }
}
