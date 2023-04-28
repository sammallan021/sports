<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = ['matche_id', 'home_team_score', 'away_team_score'];

    public function match()
    {
        return $this->belongsTo(Matche::class);
    }
}
