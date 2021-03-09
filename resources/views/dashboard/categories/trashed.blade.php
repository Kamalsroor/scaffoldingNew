<x-layout :title="trans('categories.trashed')" :breadcrumbs="['dashboard.categories.trashed']">
    @include('dashboard.categories.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('categories.actions.list') ({{ count_formatted($categories->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Category::class }}"
                        :resource="trans('categories.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Category::class }}"
                        :resource="trans('categories.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('categories.attributes.name')</th>
            <th>@lang('categories.attributes.deleted_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$category"></x-check-all-item>
                </td>
                    <td>
                    <a href="{{ route('dashboard.categories.show', $category) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $category->getFirstMediaUrl() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $category->name }}
                    </a>
                </td>

                <td>{{ $category->deleted_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.categories.partials.actions.show')
                    @include('dashboard.categories.partials.actions.restore')
                    @include('dashboard.categories.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('categories.empty')</td>
            </tr>
        @endforelse

        @if($categories->hasPages())
            @slot('footer')
                {{ $categories->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
