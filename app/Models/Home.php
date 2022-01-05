<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Away;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'convention_no',
        'league_name',
        'home_symbol',
        'home_name',
    ];

    public function aways()
    {
        return $this->belongsToMany(Away::class, 'away_home', 'home_id', 'away_id')
            ->withPivot('convention_no', 'league_name', 'game_date', 'home_team', 'away_team');
    }
}
