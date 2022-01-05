<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\player;
use App\Models\GameResult;
use App\Models\Convention;
use App\Models\League;


class convention_result extends Model
{
    use HasFactory;

    protected $fillable = [
        //
    ];

    public function convention()
    {

        return $this->belongsTo(Convention::class);
    }
    public function league()
    {

        return $this->belongsTo(Leauge::class);
    }
}
