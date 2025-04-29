@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        @include('users._form', ['user' => $user])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
