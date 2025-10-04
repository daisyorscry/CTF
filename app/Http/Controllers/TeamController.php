<?php
{
$teams = Team::withCount('users')->get();
return view('teams.index', compact('teams'));
}


public function create()
{
return view('teams.create');
}


public function store(Request $request)
{
$data = $request->validate([
'name' => 'required|string|max:255',
]);


$team = Team::create(array_merge($data, ['owner_id' => auth()->id()]));
// add owner as member
$team->users()->attach(auth()->id());


return redirect()->route('teams.show', $team)->with('success','Team created');
}


public function show(Team $team)
{
$team->load('users');
return view('teams.show', compact('team'));
}


public function addMember(Request $request, Team $team)
{
$this->authorize('update', $team);


$data = $request->validate(['email' => 'required|email']);
$user = User::where('email', $data['email'])->first();


if (! $user) return back()->with('error','User not found');


if ($team->users()->where('user_id', $user->id)->exists()) {
return back()->with('error','User already in team');
}


$team->users()->attach($user->id);
return back()->with('success','User added to team');
}


public function removeMember(Team $team, User $user)
{
$this->authorize('update', $team);
$team->users()->detach($user->id);
return back()->with('success','User removed');
}


public function destroy(Team $team)
{
$this->authorize('delete', $team);
$team->delete();
return redirect()->route('teams.index')->with('success','Team deleted');
}