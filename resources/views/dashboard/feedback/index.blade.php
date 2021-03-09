<x-layout :title="trans('feedback.plural')" :breadcrumbs="['dashboard.feedback.index']">
    @include('dashboard.feedback.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('feedback.actions.list') ({{ count_formatted($feedback->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-delete
                        type="{{ \App\Models\Feedback::class }}"
                        :resource="trans('feedback.plural')"></x-check-all-delete>
                @include('dashboard.feedback.partials.actions.read')
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('feedback.attributes.name')</th>
            <th>@lang('feedback.attributes.phone')</th>
            <th>@lang('feedback.attributes.email')</th>
            <th>@lang('feedback.attributes.message')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($feedback as $message)
            <tr class="{{ $message->read() ? 'tw-bg-gray-300' : 'font-weight-bold tw-bg-gray-100' }}">
                <td>
                    <x-check-all-item :model="$message"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.feedback.show', $message) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $message->name }}
                    </a>
                </td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ Str::limit($message->message, 10) }}</td>

                <td style="width: 160px">
                    @include('dashboard.feedback.partials.actions.show', ['feedback' => $message])
                    @include('dashboard.feedback.partials.actions.delete', ['feedback' => $message])
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('feedback.empty')</td>
            </tr>
        @endforelse

        @if($feedback->hasPages())
            @slot('footer')
                {{ $feedback->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
