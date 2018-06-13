@extends('layouts.navigation')

@section('titre', 'Salles')

@section('content')
  <h1 class="text-center">Gestion des salles</h1>

	<div class="col-8 offset-2">

		@foreach ($salles as $salle)
			<a href="#" class="d-inline-flex justify-content-center mt-2">
				<div class="card bg-light">
					<div class="card-body">
						<p>{{ $salle->nom }}</p>
					</div>
				</div>
			</a>
        @endforeach
        
	</div>

@endsection