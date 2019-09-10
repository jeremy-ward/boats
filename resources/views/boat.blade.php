@extends('layouts.main')

@section('title')
	{{$name}} - {{$type}}
@endSection

@section('heading')
	{{$name}}
@endSection

@section('body')
	<h5 class='text-center'>{{$type}}</h5>
	<p>Lastest Count: {{$count}}</p>
	<a href="https://www.yachtworld.com/boats/Sail/{{$type}}/{{$name}}" target = '_blank'>View on Yacht World</a>
@endSection