<?php

/* Dashboard
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Página Inicial', route('admin.dashboard'));
});

/* Profile
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.profile.edit', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Meu Perfil', route('admin.profile.edit'));
});

Breadcrumbs::for('admin.profile.update', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Meu Perfil', route('admin.profile.update'));
});

/* Change password
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.password.edit', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Alterar Senha', route('admin.password.edit'));
});

Breadcrumbs::for('admin.password.update', function ($trail) {
    $trail->parent('admin.profile.edit');
    $trail->push('Alterar Senha', route('admin.password.update'));
});

/* Users resources
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Administradores', route('admin.users'));
});

Breadcrumbs::for('admin.search.users', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Administradores', route('admin.users'));
});

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

/* Servants resources
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.servants', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Servidores', route('admin.servants'));
});

Breadcrumbs::for('admin.search.servants', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Servidores', route('admin.servants'));
});

Breadcrumbs::for('admin.show.servant', function ($trail, $id) {
    $trail->parent('admin.servants');
    $trail->push('Servidor #'.$id , route ('admin.show.servant', $id));
});

/* Edicts resources
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.edicts', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Editais', route('admin.edicts'));
});
Breadcrumbs::for('admin.new.edict', function ($trail) {
    $trail->parent('admin.edicts');
    $trail->push('Novo Edital', route('admin.new.edict'));
});


