<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index()
    {
        $problems = Problem::orderBy('points', 'asc')->get();
        return view('peserta.index', compact('problems'));
    }

    public function show($id)
    {
        $problem = Problem::findOrFail($id);
        return view('peserta.show', compact('problem'));
    }

    public function submitFlag(Request $request)
    {
        $data = $request->validate([
            'problem_id' => 'required|exists:problems,id',
            'flag' => 'required|string'
        ]);

        $problem = Problem::find($data['problem_id']);

        if ($problem->flag === $data['flag']) {
            Submission::updateOrCreate(
                ['user_id' => Auth::id(), 'problem_id' => $problem->id],
                ['is_correct' => true]
            );
            return back()->with('success', '✅ Correct flag! Points awarded.');
        } else {
            Submission::create([
                'user_id' => Auth::id(),
                'problem_id' => $problem->id,
                'is_correct' => false
            ]);
            return back()->with('error', '❌ Incorrect flag.');
        }
    }
}
