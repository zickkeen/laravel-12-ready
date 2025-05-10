@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Verifikasi Email Anda</h1>
    <p>Silakan cek email Anda untuk tautan verifikasi.</p>
    <p>Jika Anda tidak menerima email, klik tombol di bawah untuk mengirim ulang.</p>

    @if (session('status') == 'Verification link sent!')
        <div class="alert alert-success">
            Tautan verifikasi telah dikirim ke email Anda.
        </div>
    @endif

    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
    </form>
</div>
@endsection