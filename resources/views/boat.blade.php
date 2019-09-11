@extends('layouts.main')

@section('title')
	{{ $boat->brand }} - {{ $boat->type }}
@endSection

@section('heading')
	{{ $boat->brand }}
@endSection

@section('body')
	<h5 class='text-center'>{{ $boat->type }}</h5>
	<p>Lastest Count: {{ $latestBoatDetails->boatCount }}</p>
	<a href="https://www.yachtworld.com/boats/Sail/{{ $boat->type }}/{{ $boat->brand }}" target = '_blank'>Yacht World</a>
	<hr>
	<p>History</p>
	<ul>
		@foreach($boatDetails as $boatDetail)
			<li>{{ $boatDetail->created_at }} : {{ $boatDetail->boatCount }}</li>
		@endforeach
	</ul>
@endSection