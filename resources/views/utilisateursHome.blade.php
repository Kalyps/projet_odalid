@extends('layouts.navigation')

@section('titre', 'Utilisateurs')

@section('content')
<div class="espace" style="height:15vh;"></div>
<div class="card mx-auto " style="width: 80vw;">
  <div class="card-body">
      <h1 class="text-center">Accueil utilisateurs</h1>
    <a href="{{ route('register') }}">+</a>
    <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Compte</th>
          <th scope="col">Email</th>
          <th scope="col">Actif</th>
          <th scope="col">Role</th>
          <th scope="col">Date d'expiration</th>
          <th scope="col">Dernière connexion</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
          <tr>
              <th scope='row'><a href="{{ route('UtilisateursEdit', ['n' => $user->id ]) }}">{{ $user->id }}</a></th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->enabled }}</td>
            <td>{{ $user->roles }}</td>
            <td>{{ $user->expire_at }}</td>
            <td>{{ $user->last_login }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>  
</div>
@endsection
