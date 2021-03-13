<x-layout :title="$role->name" :breadcrumbs="['dashboard.roles.edit', $role]">
    {{ BsForm::resource('roles')->putModel($role, route('dashboard.roles.update', $role)) }}
    @component('dashboard::components.box')
        @slot('title', trans('roles.actions.edit'))

        @include('dashboard.accounts.roles.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('roles.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
