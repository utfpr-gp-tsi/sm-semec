@extends('layouts.admin.app')

@section('title', 'Editar Perfil')

@section('content')

<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	<div class="form-group string required academic_name form-group-valid"><label class="form-control-label string required" for="name">Nome <abbr title="obrigatório">*</abbr></label>
		<input class="form-control is-valid string required" autofocus="autofocus" required="required" aria-required="true" type="text" name="name" id="academic_name"
		value="{{ $user->name }}" />
	</div>
	<div class="form-row">
		<div class="col-sm-8">
			<div class="form-group email required email form-group-valid"><label class="form-control-label email required" for="email">Email <abbr title="obrigatório">*</abbr></label>
				<input class="form-control is-valid string email required" type="email" value="{{ $user->email }}" name="email"  />
			</div>

			<div class="form-group password required user_current_password">
				<label class="form-control-label password required" for="academic_current_password">Senha atual <abbr title="obrigatório">*</abbr></label>
				<input class="form-control password required" required="required" aria-required="true" type="password" name="current_password" id="academic_current_password" />
        <span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('current_password') }}</strong>
        </span>
				<small class="form-text text-muted">precisamos da sua senha atual para confirmar suas mudanças</small>
			</div>
		</div>
		<div class="col-sm-4">
			<div>
				<div id="box-image-preview" data-toggle="tooltip" data-placement="left" title="Clique na imagem para alterá-la">
					<div class="input-field image_preview">
						<div class="box-image center">
							<img src="{{ asset('assets/images/default/default-user.png') }}" class="file_preview active">

							<div class="form-group file optional user_profile_image form-group-valid">
								<input id="user_profile_image" accept="image/*" type="file" name="image" class="form-control-file is-valid file optional">
							</div>
						</div>
					</div>
					<div class="text-box text-center">
						<p class="text-input">  Clique na imagem para alterá-la</p>
					</div>
				</div>
			</div>
			<input type="hidden" name="image" id="user_profile_image_cache">
		</div>
	</div>
		<div class="d-flex">
			<a class="btn btn-secondary" href="/admin">Voltar</a>
			<input type="submit" value="Atualizar" class="btn btn-primary ml-auto" data-disable-with="Atualizar" />
		</div>
</form>
@endsection
