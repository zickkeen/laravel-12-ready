<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
  public function index()
  {
    $users = User::paginate(10);
    return view('users.index', compact('users'));
  }

  public function create()
  {
    $roles = UserRole::cases();
    return view('users.create', compact('roles'));
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name'     => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users',
      'email'    => 'required|email|unique:users,email',
      'password' => 'required|string|min:6',
      'role'     => 'required|string',
      'active'   => 'boolean',
    ]);

    $data['password'] = Hash::make($data['password']);
    $data['active'] = false;

    User::create($data);

    return redirect()->route('users.index')->with('success', 'User created.');
  }

  public function edit(User $user)
  {
    $roles = UserRole::cases();
    return view('users.edit', compact('user', 'roles'));
  }

  public function update(Request $request, User $user)
  {
    $data = $request->validate([
      'name'     => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users,username,' . $user->id,
      'email'    => 'required|email|unique:users,email,' . $user->id,
      'password' => 'nullable|string|min:6',
      'role'     => 'required|string',
      'active'   => 'boolean',
    ]);

    if (!empty($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else {
      unset($data['password']);
    }

    $user->update($data);

    return redirect()->route('users.index')->with('success', 'User updated.');
  }

  public function showProfile()
  {
    return view('users.profile');
  }

  public function updateProfile(Request $request)
  {
    // Log::info($request->all());
    $user = Auth::user();

    if (!$user instanceof \App\Models\User) {
      abort(500, 'Instance pengguna tidak valid');
    }

    if (!$user) {
      abort(403, 'Unauthorized');
    }

    $request->validate([
      'name' => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users,username,' . $user->id,
      'email' => 'required|email|unique:users,email,' . $user->id,
      'avatar' => 'nullable|image|max:2048',
      'current_password' => 'nullable|required_with:new_password|string',
      'new_password' => 'nullable|required_with:current_password|string|min:8|confirmed',
    ]);

    if ($request->filled('new_password')) {
      if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah']);
      }
      $user->password = Hash::make($request->new_password);
    }

    if ($request->hasFile('avatar')) {
      $filename = $user->id . '.' . $request->avatar->extension();
      $path = $request->avatar->storeAs('avatars', $filename, 'public');
      $user->avatar_url = '/storage/' . $path;
    } else {
      $user->avatar_url = '/storage/avatars/default.png';
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->route('profile')->with('status', 'Profil berhasil diperbarui.');
  }

  public function destroy(User $user)
  {
    $user->active = false;
    $user->save();
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
  }
}
