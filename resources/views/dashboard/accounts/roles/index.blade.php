<x-layout :title="trans('roles.plural')" :breadcrumbs="['dashboard.roles.index']">
    @include('dashboard.accounts.roles.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('roles.actions.list') ({{ $roles->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                    type="{{ \App\Models\Role::class }}"
                    :resource="trans('roles.plural')"></x-check-all-delete>
                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.accounts.roles.partials.actions.create')
                    @include('dashboard.accounts.roles.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('roles.attributes.name')</th>
            <th>@lang('roles.attributes.created_at')</th>
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
                <td>{{ $role->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.roles.partials.actions.show')
                    @include('dashboard.accounts.roles.partials.actions.edit')
                    @include('dashboard.accounts.roles.partials.actions.delete')
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
