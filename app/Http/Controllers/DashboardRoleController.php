<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardRoleController extends Controller
{
    public function __construct()
    {
        // note:
        /**
         * permission dengan cara ini ada beberapa hal yang perlu diperhatikan:
         * 1. Izin (Permission) Harus Sudah Dibuat: Pastikan izin (permission) yang Anda gunakan sudah dibuat di dalam sistem.
         * 2. Izin Harus Sudah Diberikan ke Role atau User: Pastikan role atau user yang mengakses metode tersebut sudah diberikan izin yang sesuai.
        */
        $this->middleware('permission:view.role', ['only' => ['index']]);
        $this->middleware('permission:create.role', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit.role', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete.role', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->input('query');

        if ($query) {
            $roles = Role::where('name', 'LIKE', "%$query%")->paginate(10)->withQueryString();
        } else {
            $roles = Role::paginate(10);
        }
        return view('dashboard.role-permission.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.role-permission.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {

        try {
            // Simpan data
            Role::create($request->all());

            return redirect()->route('roles.index')->with('success', 'Role has been created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('roles.index')->withInput($request->all())->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('dashboard.role-permission.roles.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        try {
            // Simpan data
            $role->update($request->all());

            return redirect()->route('roles.index')->with('success', 'Role has been updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('roles.index')->withInput($request->all())->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            // Simpan data
            $role->delete();

            return redirect()->route('roles.index')->with('success', 'Role has been deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('roles.index')->withErrors([$th->getMessage()]);
        }
    }

    public function addPermissionToRole(Role $role)
    {
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id');

        return view('dashboard.role-permission.roles.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    public function updatePermissionToRole(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'permissions' => 'required'
        ]);

        try {
            $role->syncPermissions($validatedData);

            return redirect()->back()->with('success', 'Permission has been added to role.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([$th->getMessage()]);
        }
    }
}
