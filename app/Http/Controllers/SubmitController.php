<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Submission;
use App\Http\Controllers\Controller;


class SubmitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'problem_id' => 'required|integer|exists:problems,id',
            'flag' => 'required|string'
        ]);


        $user = auth()->user();
        $problem = Problem::findOrFail($data['problem_id']);


        // normalize flags (simple)
        $submitted = trim($data['flag']);
        $correct = hash_equals(trim($problem->flag), $submitted);


        // check already solved
        $already = Submission::where('user_id', $user->id)
            ->where('problem_id', $problem->id)
            ->where('correct', true)
            ->exists();


        $awarded = 0;
        if ($correct && ! $already) {
            $awarded = $problem->points;
        }


        Submission::create([
            'user_id' => $user->id,
            'problem_id' => $problem->id,
            'submitted_flag' => $submitted,
            'correct' => $correct,
            'awarded' => $awarded,
        ]);


        if ($correct && $awarded > 0) {
            return redirect()->route('problems.show', $problem)->with('success', "Flag benar — +{$awarded} points");
        }


        return redirect()->route('problems.show', $problem)->with('error', 'Flag salah');
    }
}
