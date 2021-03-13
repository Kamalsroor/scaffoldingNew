@can('view', $role)
    <a href="{{ route('dashboard.roles.show', $role) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
