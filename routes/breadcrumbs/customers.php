<?php

Breadcrumbs::for('dashboard.customers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('customers.plural'), route('dashboard.customers.index'));
});

Breadcrumbs::for('dashboard.customers.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.customers.index');
    $breadcrumb->push(trans('customers.trashed'), route('dashboard.customers.trashed'));
});

Breadcrumbs::for('dashboard.customers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.customers.index');
    $breadcrumb->push(trans('customers.actions.create'), route('dashboard.customers.create'));
});

Breadcrumbs::for('dashboard.customers.show', function ($breadcrumb, $customer) {
    $breadcrumb->parent('dashboard.customers.index');
    $breadcrumb->push($customer->name, route('dashboard.customers.show', $customer));
});

Breadcrumbs::for('dashboard.customers.edit', function ($breadcrumb, $customer) {
    $breadcrumb->parent('dashboard.customers.show', $customer);
    $breadcrumb->push(trans('customers.actions.edit'), route('dashboard.customers.edit', $customer));
});
