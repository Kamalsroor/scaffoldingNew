@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs


<fieldset>
    <legend>@lang('permissions.plural')</legend>
    @foreach(config('permission.supported') as $permission)
        {{ BsForm::checkbox('permissions[]')
                ->value($permission)
                ->withoutDefault()
                ->label(trans(str_replace('manage.', '', $permission.'.permission')))
                ->checked(isset($role) && $role->hasPermissionTo($permission)) }}
    @endforeach
</fieldset>
