<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class ScoreboardController extends Controller
{
    public function index()
    {
        // per-user scoreboard
        $users = DB::table('submissions')
            ->selectRaw('user_id, SUM(awarded) as score')
            ->where('correct', true)
            ->groupBy('user_id')
            ->orderByDesc('score')
            ->get();


        // join with users
        $board = $users->map(function ($row) {
            $user = User::find($row->user_id);
            return [
                'user' => $user ? $user->name : 'Unknown',
                'score' => (int)$row->score,
            ];
        });


        return view('scoreboard.index', ['board' => $board]);
    }
}
