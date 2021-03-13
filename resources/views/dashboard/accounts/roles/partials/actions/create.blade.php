@can('create', \App\Models\Role::class)
    <a href="{{ route('dashboard.roles.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('roles.actions.create')
    </a>
@endcan
