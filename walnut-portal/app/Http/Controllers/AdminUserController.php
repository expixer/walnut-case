<?php
namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller {
    public function index() {
        $users = AdminUser::paginate(10);
        return view('admin-users.index', compact('users'));
    }

    public function create() {
        return view('admin-users.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|unique:admin_users',
            'password' => 'required|min:6'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        AdminUser::create($validated);

        return redirect()->route('admin-users.index');
    }

    public function edit(AdminUser $adminUser) {
        return view('admin-users.edit', compact('adminUser'));
    }

    public function update(Request $request, AdminUser $adminUser) {
        $validated = $request->validate([
            'email' => 'required|email|unique:admin_users,email,' . $adminUser->id,
            'password' => 'nullable|min:6'
        ]);

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $adminUser->update($validated);
        return redirect()->route('admin-users.index');
    }

    public function destroy(AdminUser $adminUser) {
        $adminUser->delete();
        return redirect()->route('admin-users.index');
    }
}
