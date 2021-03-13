<x-layout :title="$role->name" :breadcrumbs="['dashboard.roles.show', $role]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('roles.attributes.name')</th>
                        <td>{{ $role->name }}</td>


                    </tr>
                    <tr>
                        <th width="200">@lang('permissions.plural')</th>
                        <td>
                            @foreach($role->getAllPermissions() as $permission)
                            <h4><span class="badge badge-pill bg-info">{{trans(str_replace('manage.', '', $permission->name.'.permission'))}}</span></h4>
                            @endforeach
                        </td>

                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.accounts.roles.partials.actions.edit')
                    @include('dashboard.accounts.roles.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
