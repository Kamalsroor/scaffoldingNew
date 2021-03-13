<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::filter()->paginate();

        return view('dashboard.accounts.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.accounts.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->syncPermissions($request->input('permissions'));
        flash(trans('roles.messages.created'));

        return redirect()->route('dashboard.roles.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('dashboard.accounts.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('dashboard.accounts.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\RoleRequest $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->syncPermissions($request->input('permissions'));

        flash(trans('roles.messages.updated'));

        return redirect()->route('dashboard.roles.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();

        flash(trans('roles.messages.deleted'));

        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewTrash', Role::class);

        $roles = Role::onlyTrashed()->paginate();

        return view('dashboard.accounts.roles.trashed', compact('roles'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Role $role)
    {
        return view('dashboard.accounts.roles.show', compact('role'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Role $role)
    {
        $this->authorize('restore', $role);

        $role->restore();

        flash()->success(trans('roles.messages.restored'));

        return redirect()->route('dashboard.roles.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Role $role)
    {
        $this->authorize('forceDelete', $role);

        $role->forceDelete();

        flash(trans('roles.messages.deleted'));

        return redirect()->route('dashboard.roles.trashed');
    }
}
