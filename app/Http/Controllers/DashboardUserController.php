<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DashboardUserController extends Controller
{
    public function __construct()
    {
        // note:
        /**
         * permission dengan cara ini ada beberapa hal yang perlu diperhatikan:
         * 1. Izin (Permission) Harus Sudah Dibuat: Pastikan izin (permission) yang Anda gunakan sudah dibuat di dalam sistem.
         * 2. Izin Harus Sudah Diberikan ke Role atau User: Pastikan role atau user yang mengakses metode tersebut sudah diberikan izin yang sesuai.
         */
        $this->middleware('permission:view.user', ['only' => ['index']]);
        $this->middleware('permission:create.user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit.user', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete.user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->input('query');

        if ($query) {
            $users = User::where('name', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%")
                ->paginate(10)->withQueryString();
        } else {
            $users = User::paginate(10);
        }

        return view('dashboard.role-permission.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.role-permission.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $validatedData = $request->validated();
        
        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            $user->syncRoles($validatedData['roles']);

            return redirect()
                ->route('users.index')
                ->with('success', 'User has been created successfully.');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', 'User gagal ditambah!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('dashboard.role-permission.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();

        try {
            // Update data user
            $userData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ];

            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|string|min:6|max:20',
                ]);
                $userData['password'] = Hash::make($validatedData['password']);
            }

            $user->update($userData);

            // Sinkronisasi role
            $user->syncRoles($request->roles);

            return redirect()->route('users.index')->with('success', 'User has been updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->withInput($request->all())->withErrors([$th->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // Simpan data
            $user->delete();

            return redirect()->route('users.index')->with('success', 'User has been deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->withErrors([$th->getMessage()]);
        }
    }
}
