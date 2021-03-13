@if($role)
    @if(method_exists($role, 'trashed') && $role->trashed())
        <a href="{{ route('dashboard.roles.trashed.show', $role) }}" class="text-decoration-none text-ellipsis">
            {{ $role->name }}
        </a>
    @else
        <a href="{{ route('dashboard.roles.show', $role) }}" class="text-decoration-none text-ellipsis">
            {{ $role->name }}
        </a>
    @endif
@else
    ---
@endif
