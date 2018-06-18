@extends('layouts.salles')

@section('titre', $salle->nom)

@section('nom', $salle->nom)

@section('option')
    <option value="">Aucune</option>
	@foreach ($zones as $zone)
		@if ($zone->id === $salle->zone_id)
    		<option value="{{ $zone->id }}" selected>{{ $zone->nom }}</option>
    	@else
    		<option value="{{ $zone->id }}">{{ $zone->nom }}</option>
    	@endif
    @endforeach
@endsection

@section('supprimer')
	<br/><br/>
	<a href=""><button>Supprimer</button></a>
@endsection