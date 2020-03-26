@extends('layouts.admin.app')

@section('title', 'Administrador')

@section('content')

<div class="row">
  <div class="card">
      <div class="card-body">
          <img class="card-profile-img mt-1" src="{{ $user->image }}">
              <label class="form-label">Nome: <p>{{ $user->name }}</p></label>
              <label class="form-label">Email: <p>{{ $user->email }}</p></label>
              <label class="form-label">Criado em: <p>{{ $user->dateFormat($user->created_at)}}</p> </label>
              <label class="form-label">Atualizado em:<p>{{ $user->dateFormat($user->updated_at)}}</p> </label>

      </div>
  </div>

</div>

@component('components.links.edit', ['url' => route('admin.edit.user', $user->id)]) @endcomponent

@endsection
