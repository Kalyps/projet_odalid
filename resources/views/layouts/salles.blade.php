@extends('layouts.navigation')

@section('titre', 'Salles')

@section('content')
<!-- <div class="espace" style="height:13vh;"></div>
<div class="card mx-auto" style="width: 87vw; height:81vh">
<div class="card-header">
    <h1 class="text-center">Salles - @yield('titre')</h1>
</div>
    <form name="modif" action="" method="POST">
        <p>
            <label for="nom">Nom* : </label>
            <input type="text" id="nom" name="nom" value="@yield('nom')" required>
            <label for="zone_id">Zone* : </label>
            <select id="zone_id" name="zone_id">
                @yield('option')
            </select>
        </p>

        {{ csrf_field() }}
        <input type="submit" value="Valider">
    </form>
    @yield('supprimer')
    <br/><br/><br/>
    <a href="{{ route('Salles') }}"><button>Retour</button></a>
  </div> -->

  <div class="espace" style="height:29vh;"></div>
<div class="card mx-auto" style="width: 39vw; height:50vh">
<div class="card-header">

    <h1 class="text-center">Salle - @yield('titre')</h1>
</div>
<form name="modif" action="" method="POST">

    <br>
      <div class="form-group row">
          <label for="nom" class="col-md-4 col-form-label text-md-right">Nom </label>
          <div class="col-md-6">
              <input id="nom" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nom"  value="@yield('nom')" required autofocus>
              @if ($errors->has('name'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group row">
      <label for="zone_id" class="col-md-4 col-form-label text-md-right">Zone* : </label>
      <div class="col-md-6">
      <select id="zone_id" name="zone_id">
          @yield('option')
      </select>
    </div>
  </div>
      <div class="col-md-6">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-4 col-form-label  mx-auto">
            <button type="submit" class="btn btn-primary btn-md">Valider</button>
        </div>
    </div>
  </div>
</form>

    @yield('supprimer')
<br><br><br>
  	<a href="{{ route('Salles') }}"><button class="btn btn-blue-grey" style="bottom:-5vh; left: 1vw; ">Retour</button></a>
  </div>
@endsection
