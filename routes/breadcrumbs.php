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

Breadcrumbs::for('admin.edicts.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Editais', route('admin.edicts'));
});

Breadcrumbs::for('admin.search.edicts.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Editais', route('admin.edicts'));
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

/* Category of Units
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.categories', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Categorias de Unidades', route('admin.categories'));
});

Breadcrumbs::for('admin.new.category', function ($trail) {
    $trail->parent('admin.categories');
    $trail->push('Nova Categoria', route('admin.new.category'));
});

Breadcrumbs::for('admin.search.categories', function ($trail) {
    $trail->parent('admin.categories');
    $trail->push('Buscar Categorias', route('admin.search.categories'));
});

Breadcrumbs::for('admin.edit.category', function ($trail, $id) {
    $trail->parent('admin.categories');
    $trail->push('Editar Categoria #'.$id, route('admin.edit.category', $id));
});

Breadcrumbs::for('admin.update.category', function ($trail, $id) {
    $trail->parent('admin.categories');
    $trail->push('Editar Categoria', route('admin.update.category', $id));
});

Breadcrumbs::for('admin.create.category', function ($trail) {
    $trail->parent('admin.categories');
    $trail->push('Nova Categoria', route('admin.create.category'));
});

Breadcrumbs::for('admin.categories.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Categorias', route('admin.categories'));
});

Breadcrumbs::for('admin.search.categories.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Categorias', route('admin.categories'));
});


/* Units
|-------------------------------------------------------------------------- */
Breadcrumbs::for('admin.units', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Unidades', route('admin.units'));
});

Breadcrumbs::for('admin.new.unit', function ($trail) {
    $trail->parent('admin.units');
    $trail->push('Nova Unidade', route('admin.new.unit'));
});

Breadcrumbs::for('admin.search.units', function ($trail) {
    $trail->parent('admin.units');
    $trail->push('Buscar Unidades', route('admin.search.units'));
});

Breadcrumbs::for('admin.edit.unit', function ($trail, $id) {
    $trail->parent('admin.units');
    $trail->push('Editar Unidade #'.$id, route('admin.edit.unit', $id));
});

Breadcrumbs::for('admin.update.unit', function ($trail, $id) {
    $trail->parent('admin.units');
    $trail->push('Editar Unidade', route('admin.update.unit', $id));
});

Breadcrumbs::for('admin.create.unit', function ($trail) {
    $trail->parent('admin.units');
    $trail->push('Nova Unidade', route('admin.create.unit'));
});

Breadcrumbs::for('admin.show.unit', function ($trail, $id) {
    $trail->parent('admin.units');
    $trail->push('Unidade', route('admin.show.unit', $id));
});

Breadcrumbs::for('admin.units.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Unidades', route('admin.units'));
});

Breadcrumbs::for('admin.search.units.page', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Unidades', route('admin.units'));
});
