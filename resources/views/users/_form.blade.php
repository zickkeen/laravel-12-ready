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
  <div class="input-group">
    <input type="password" name="password" id="password" class="form-control">
    <button type="button" class="btn btn-outline-secondary" id="generate-password">Generate</button>
    <button type="button" class="btn btn-outline-secondary" id="toggle-password">Show</button>
  </div>
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

@push('scripts')
<script>
    // Generate Password
    document.getElementById('generate-password').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const generatedPassword = generatePassword(12); // Panjang password 12 karakter
        passwordField.value = generatedPassword;
    });

    function generatePassword(length) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
        let password = "";
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset[randomIndex];
        }
        return password;
    }

    // Toggle Password Visibility
    document.getElementById('toggle-password').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const toggleButton = this;

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            passwordField.type = 'password';
            toggleButton.textContent = 'Show';
        }
    });
</script>
@endpush