<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RankingController;



Route::view('/',"layouts.app" )->name("dashboard");

Route::resource('/sports', SportController::class);
Route::get('/sports/trie',[SportController::class,"trie_sport"] )->name('sports.trie');
Route::post('/sports/filtre', [SportController::class,"Filter_sport"] )->name('Filter_sport');

Route::resource('/players', PlayerController::class);
Route::get('/players/trie',[PlayerController::class,"trie_player"] )->name('players.trie');
Route::post('/players/filtre', [PlayerController::class,"Filter_player"] )->name('Filter_player');

Route::resource('/teams', TeamController::class);
Route::get('/teams/trie',[TeamController::class,"trie_team"] )->name('teams.trie');
Route::post('/teams/filtre', [TeamController::class,"Filter_team"] )->name('Filter_team');


Route::resource('/matches', MatcheController::class);
Route::get('/matches/trie',[MatcheController::class,"trie_matche"] )->name('matches.trie');
Route::post('/matches/filtre', [MatcheController::class,"Filter_matche"] )->name('Filter_matche');

Route::resource('/results', ResultController::class);
Route::get('/results/trie',[ResultController::class,"trie_result"] )->name('results.trie');
Route::post('/results/filtre', [ResultController::class,"Filter_result"] )->name('Filter_result');

Route::resource('/rankings', RankingController::class);
Route::get('/rankings/trie',[RankingController::class,"trie_ranking"] )->name('rankings.trie');
Route::post('/rankings/filtre', [RankingController::class,"Filter_ranking"] )->name('Filter_ranking');
