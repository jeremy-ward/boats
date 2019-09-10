@extends('layouts.main')

@section('title', 'Boat Brands')

@section('heading')
	Boat Brands
@endSection

@section('body')
<div class = 'container'>
	<div class = 'row'>
		@foreach($brands as $brand)
			<div class='col-sm-4'><a href = '/boat/{{$brand->id}}'>{{$brand->brand}}</a></div>
		@endforeach
	</div>
</div>
@endSection
