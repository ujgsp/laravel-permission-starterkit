<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class DashboardPermissionController extends Controller
{
    public function __construct()
    {
        // note:
        /**
         * permission dengan cara ini ada beberapa hal yang perlu diperhatikan:
         * 1. Izin (Permission) Harus Sudah Dibuat: Pastikan izin (permission) yang Anda gunakan sudah dibuat di dalam sistem.
         * 2. Izin Harus Sudah Diberikan ke Role atau User: Pastikan role atau user yang mengakses metode tersebut sudah diberikan izin yang sesuai.
        */
        $this->middleware('permission:view.permission', ['only' => ['index']]);
        $this->middleware('permission:create.permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit.permission', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete.permission', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->input('query');

        if ($query) {
            $permissions = Permission::where('name', 'LIKE', "%$query%")->paginate(10)->withQueryString();
        } else {
            $permissions = Permission::paginate(10);
        }

        return view('dashboard.role-permission.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.role-permission.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionStoreRequest $request)
    {
        try {
            // Simpan data
            Permission::create($request->all());

            return redirect()->route('permissions.index')->with('success', 'Permission has been created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('permissions.index')->withInput($request->all())->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('dashboard.role-permission.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        try {
            // Simpan data
            $permission->update($request->all());

            return redirect()->route('permissions.index')->with('success', 'Permission has been updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('permissions.index')->withInput($request->all())->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        try {
            // Simpan data
            $permission->delete();

            return redirect()->route('permissions.index')->with('success', 'Permission has been deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('permissions.index')->withErrors([$th->getMessage()]);
        }
    }
}
