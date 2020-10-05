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

Breadcrumbs::for('admin.servants.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Servidores', route('admin.servants'));
});

Breadcrumbs::for('admin.search.servants', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Servidores', route('admin.servants'));
});

Breadcrumbs::for('admin.search.servants.page', function ($trail) {
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

Breadcrumbs::for('admin.edicts.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Editais', route('admin.edicts'));
});

Breadcrumbs::for('admin.create.edict', function ($trail) {
    $trail->parent('admin.edicts');
    $trail->push('Novo Edital', route('admin.new.edict'));
});

Breadcrumbs::for('admin.new.edict', function ($trail) {
    $trail->parent('admin.edicts');
    $trail->push('Novo Edital', route('admin.new.edict'));
});

Breadcrumbs::for('admin.search.edicts', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Editais', route('admin.edicts'));
});

Breadcrumbs::for('admin.search.edicts.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Editais', route('admin.edicts'));
});


Breadcrumbs::for('admin.show.edict', function ($trail, $id) {
    $trail->parent('admin.edicts');
    $trail->push('Edital #'.$id , route ('admin.show.edict', $id));
});


Breadcrumbs::for('admin.edit.edict', function ($trail, $id) {
    $trail->parent('admin.edicts', $id);
    $trail->push('Editar Edital #'.$id, route('admin.edit.edict', $id));
});

Breadcrumbs::for('admin.update.edict', function ($trail, $id) {
    $trail->parent('admin.edicts');
    $trail->push('Editar Edital', route('admin.update.edict', $id));
});

/* Pdfs Edict
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.index.pdf', function ($trail, $id) {
    $trail->parent('admin.edicts');
    $trail->push('Novo PDF', route('admin.index.pdf', $id));
});

Breadcrumbs::for('admin.create.pdf', function ($trail, $id) {
    $trail->parent('admin.edicts');
    $trail->push('Novo PDF', route('admin.create.pdf', $id));
});

/* Dashboard Servant
|-------------------------------------------------------------------------- */
Breadcrumbs::for('servant.dashboard', function ($trail) {
    $trail->push('Página Inicial', route('servant.dashboard'));
});

/* Profile
|-------------------------------------------------------------------------- */
Breadcrumbs::for('servant.profile.edit', function ($trail) {
    $trail->parent('servant.dashboard');
    $trail->push('Meu Perfil', route('servant.profile.edit'));
});

Breadcrumbs::for('servant.profile.update', function ($trail) {
    $trail->parent('servant.dashboard');
    $trail->push('Meu Perfil', route('servant.profile.update'));
});

/* Change password
|-------------------------------------------------------------------------- */
Breadcrumbs::for('servant.password.edit', function ($trail) {
    $trail->parent('servant.dashboard');
    $trail->push('Alterar Senha', route('servant.password.edit'));
});

Breadcrumbs::for('servant.profile.password.update', function ($trail) {
    $trail->parent('servant.profile.edit');
    $trail->push('Alterar Senha', route('servant.profile.password.update'));
});
