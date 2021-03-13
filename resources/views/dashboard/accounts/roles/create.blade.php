<x-layout :title="trans('roles.actions.create')" :breadcrumbs="['dashboard.roles.create']">
    {{ BsForm::resource('roles')->post(route('dashboard.roles.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('roles.actions.create'))

        @include('dashboard.accounts.roles.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('roles.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
