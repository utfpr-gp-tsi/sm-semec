@extends('layouts.admin.app')

@section('title', 'Administradores')
@section('content')

@component('components.index.header', ['search_url' => route('admin.users'), 'new_url' => route('admin.new.user')]) @endcomponent

<div class="table-striped mt-3 table-responsive">
  <table class="table card-table table-vcenter table-data">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Criado em</th>
        <th></th>
      </tr>
    </thead>
    @foreach($users as $key => $user)
      <tbody>
        <tr>
          <td><a href="{{route('admin.show.user', $user->id)}}">{{ $user->name }}</a></td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->dateFormat($user->created_at) }}</td>
          <td >
            @component('components.links.edit', ['url' => route('admin.edit.user', $user->id)]) @endcomponent
            @component('components.links.delete', ['url' => route('admin.destroy.user', $user->id)]) @endcomponent
          </td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>

@endsection
