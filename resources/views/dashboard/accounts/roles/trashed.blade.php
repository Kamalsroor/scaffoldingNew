<x-layout :title="trans('roles.trashed')" :breadcrumbs="['dashboard.roles.trashed']">
    @include('dashboard.accounts.roles.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('roles.actions.list') ({{ count_formatted($roles->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Role::class }}"
                        :resource="trans('roles.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Role::class }}"
                        :resource="trans('roles.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('roles.attributes.name')</th>
            <th>@lang('roles.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$role"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.roles.show', $role) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $role->name }}
                    </a>
                </td>

                <td>{{ $role->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.roles.partials.actions.show')
                    @include('dashboard.accounts.roles.partials.actions.restore')
                    @include('dashboard.accounts.roles.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('roles.empty')</td>
            </tr>
        @endforelse

        @if($roles->hasPages())
            @slot('footer')
                {{ $roles->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
