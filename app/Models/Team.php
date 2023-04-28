<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = ['name', 'city', 'sport_id'];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function homeMatches()
    {
        return $this->hasMany(Matche::class, 'home_team_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(Matche::class, 'away_team_id');
    }

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }
}
