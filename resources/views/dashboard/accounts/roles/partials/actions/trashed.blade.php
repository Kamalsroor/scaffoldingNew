@can('viewTrash', \App\Models\Role::class)
    <a href="{{ route('dashboard.roles.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('roles.trashed')
    </a>
@endcan
