<div class="mb-3">
  <label>Name</label>
  <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
  <label>Username</label>
  <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
  <label>Email</label>
  <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
  <label>Password @if(!isset($user))<small>(required)</small>@else<small>(leave blank to keep current)</small>@endif</label>
  <input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
  <label>Role</label>
  <select name="role" class="form-select" required>
      @foreach($roles as $role)
          <option value="{{ $role->value }}" @if(old('role', $user->role ?? '') == $role->value) selected @endif>
              {{ ucfirst($role->value) }}
          </option>
      @endforeach
  </select>
</div>

<div class="form-check mb-3">
  <input type="checkbox" name="active" class="form-check-input" id="active" value="1" @if(old('active', $user->active ?? true)) checked @endif>
  <label class="form-check-label" for="active">Active</label>
</div>
