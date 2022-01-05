<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Home;

class Away extends Model
{
    use HasFactory;

    protected $fillable = [
        'convention_no',
        'league_name',
        'away_symbol',
        'away_name',
    ];

    public function homes()
    {
        return $this->belongsToMany(Home::class, 'away_home', 'home_id', 'away_id')
            ->withPivot('convention_no', 'league_name', 'game_date', 'home_team', 'away_team');
    }
}
