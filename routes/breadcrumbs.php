<?php

// Página Inicial
Breadcrumbs::for('admin.dashboard', function ($trail) {
	$trail->push('Página Inicial', route('admin.dashboard'));
});

//Página Inicial/Meu Perfil
Breadcrumbs::for('profile.edit', function ($trail) {
	$trail->parent('admin.dashboard');
	$trail->push('Meu Perfil', route('profile.edit'));
});

Breadcrumbs::for('profile.update', function ($trail) {
	$trail->parent('admin.dashboard');
	$trail->push('Meu Perfil', route('profile.update'));
});

//Página Inicial/Alterar Senha
Breadcrumbs::for('password.edit', function ($trail) {
	$trail->parent('admin.dashboard');
	$trail->push('Alterar Senha', route('password.edit'));
});

Breadcrumbs::for('password.update', function ($trail) {
	$trail->parent('profile.edit');
	$trail->push('Alterar Senha', route('password.update'));
});

Breadcrumbs::for('admin.users', function ($trail) {
	$trail->parent('admin.dashboard');
	$trail->push('Administradores', route('admin.users'));
});

Breadcrumbs::for('admin.show.user', function ($trail, $user) {
	$trail->parent('admin.users');
	$trail->push('Administrador', route('admin.show.user',$user));
});

Breadcrumbs::for('admin.edit.user', function ($trail, $user) {
	$trail->parent('admin.show.user', $user);
	$trail->push('Editar Administrador', route('admin.edit.user', $user));
});

Breadcrumbs::for('admin.new.user', function ($trail) {
	$trail->parent('admin.users');
	$trail->push('Novo Administrador', route('admin.new.user'));
});

