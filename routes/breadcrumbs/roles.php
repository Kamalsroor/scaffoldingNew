<?php

Breadcrumbs::for('dashboard.roles.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('roles.plural'), route('dashboard.roles.index'));
});


Breadcrumbs::for('dashboard.roles.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.roles.index');
    $breadcrumb->push(trans('roles.trashed'), route('dashboard.roles.trashed'));
});


Breadcrumbs::for('dashboard.roles.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.roles.index');
    $breadcrumb->push(trans('roles.actions.create'), route('dashboard.roles.create'));
});

Breadcrumbs::for('dashboard.roles.show', function ($breadcrumb, $role) {
    $breadcrumb->parent('dashboard.roles.index');
    $breadcrumb->push($role->name, route('dashboard.roles.show', $role));
});

Breadcrumbs::for('dashboard.roles.edit', function ($breadcrumb, $role) {
    $breadcrumb->parent('dashboard.roles.show', $role);
    $breadcrumb->push(trans('roles.actions.edit'), route('dashboard.roles.edit', $role));
});



