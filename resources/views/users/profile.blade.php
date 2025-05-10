@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Card Profile -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">Pengaturan Profil</div>

                    <div class="card-body">
                        <!-- Flash message -->
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <!-- Form Profile -->
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Avatar -->
                            <div class="mb-4 text-center">
                                <img src="{{ Auth::user()->avatar_url ?? asset('/storage/avatars/default.png') }}"
                                    class="rounded-circle mb-2" width="100" height="100" alt="Avatar">
                                <div>
                                    <input type="file" name="avatar" class="form-control-file form-control-sm">
                                    <small class="text-muted">Max 2MB, JPG/PNG</small>
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', Auth::user()->name) }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', Auth::user()->email) }}" required>
                            </div>

                            <!-- Username (non-editable optional) -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ Auth::user()->username }}" readonly>
                            </div>

                            <!-- Password Change -->
                            <hr class="my-4">
                            <h6 class="text-muted">Ganti Password</h6>

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="generate-password">Generate</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="toggle-password">Show</button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="new_password_confirmation"
                                        id="new_password_confirmation">
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="toggle-confirm-password">Show</button>
                                </div>
                            </div>

                            <!-- Notification Preferences (Optional) -->
                            <hr class="my-4">
                            <h6 class="text-muted">Preferensi</h6>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="notif_server" checked>
                                <label class="form-check-label">Terima notifikasi status server</label>
                            </div>

                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" name="notif_login">
                                <label class="form-check-label">Notifikasi login tidak dikenal</label>
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Generate Password
    document.getElementById('generate-password').addEventListener('click', function () {
        const passwordField = document.getElementById('new_password');
        const confirmPasswordField = document.getElementById('new_password_confirmation');
        const generatedPassword = generatePassword(12); // Panjang password 12 karakter
        passwordField.value = generatedPassword;
        confirmPasswordField.value = generatedPassword;
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
        const passwordField = document.getElementById('new_password');
        const toggleButton = this;

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            passwordField.type = 'password';
            toggleButton.textContent = 'Show';
        }
    });

    document.getElementById('toggle-confirm-password').addEventListener('click', function () {
        const confirmPasswordField = document.getElementById('new_password_confirmation');
        const toggleButton = this;

        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            confirmPasswordField.type = 'password';
            toggleButton.textContent = 'Show';
        }
    });
</script>
@endpush