@extends('layouts.app')

@section('title','Scoreboard')

@section('content')
<h1>Scoreboard</h1>

@if(empty($board) || count($board) == 0)
    <div class="alert alert-info">No scores yet.</div>
@else
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Player</th>
                <th class="text-end">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($board as $i => $row)
                <tr @if($i==0) class="table-success" @endif>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $row['user'] }}</td>
                    <td class="text-end">{{ $row['score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
