@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Role::class])
    @slot('url', route('dashboard.roles.index'))
    @slot('name', trans('roles.plural'))
    @slot('active', request()->routeIs('*roles*'))
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => trans('roles.actions.list'),
            'url' => route('dashboard.roles.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Role::class],
            'active' => request()->routeIs('*roles.index')
            || request()->routeIs('*roles.show'),
        ],
        [
            'name' => trans('roles.actions.create'),
            'url' => route('dashboard.roles.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Role::class],
            'active' => request()->routeIs('*roles.create'),
        ],
    ])
@endcomponent
