@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create User</h2>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        @include('users._form')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
