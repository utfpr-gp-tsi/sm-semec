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

/* Users resources
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.show.user', function ($trail, $id) {
    $trail->parent('admin.users');
    $trail->push('Administrador #'.$id , route ('admin.show.user', $id));
});

Breadcrumbs::for('admin.edit.user', function ($trail, $id) {
    $trail->parent('admin.users', $id);
    $trail->push('Editar Administrador #'.$id, route('admin.edit.user', $id));
});

Breadcrumbs::for('admin.update.user', function ($trail, $id) {
    $trail->parent('admin.users');
    $trail->push('Editar Administrador', route('admin.update.user', $id));
});

Breadcrumbs::for('admin.new.user', function ($trail) {
    $trail->parent('admin.users');
    $trail->push('Novo Administrador', route('admin.new.user'));
});

Breadcrumbs::for('admin.create.user', function ($trail) {
    $trail->parent('admin.users');
    $trail->push('Novo Administrador', route('admin.create.user'));
});