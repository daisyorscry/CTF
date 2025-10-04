<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index()
    {
        $problems = Problem::paginate(6);

        if (auth()->user()->is_admin) {
            return view('problems.index', compact('problems'));
        } else {
            return view('peserta.problems.index', compact('problems'));
        }
    }

    public function show(Problem $problem)
    {
        if (auth()->user()->is_admin) {
            return view('problems.show', compact('problem'));
        } else {
            return view('peserta.problems.show', compact('problem'));
        }
    }

    public function create()
    {
        return view('problems.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'points' => 'required|integer',
            'category' => 'nullable|string|max:255',
        ]);

        Problem::create($request->all());

        return redirect()->route('problems.index')->with('success', 'Problem berhasil dibuat!');
    }

    public function edit(Problem $problem)
    {
        return view('problems.edit', compact('problem'));
    }

    public function update(Request $request, Problem $problem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'points' => 'required|integer',
            'category' => 'nullable|string|max:255',
        ]);

        $problem->update($request->all());

        return redirect()->route('problems.index')->with('success', 'Problem berhasil diperbarui!');
    }

    public function destroy(Problem $problem)
    {
        $problem->delete();

        return redirect()->route('problems.index')->with('success', 'Problem berhasil dihapus!');
    }
}
