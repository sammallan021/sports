<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'rankings';

    protected $fillable = ['team_id', 'points', 'wins', 'losses'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
