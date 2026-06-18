@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Create User</h2>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <input type="text"
            name="name"
            placeholder="Name"
            class="form-control mb-2">

        <input type="email"
            name="email"
            placeholder="Email"
            class="form-control mb-2">

        <input type="password"
            name="password"
            placeholder="Password"
            class="form-control mb-2">

        <select name="role">
            <option value="user">User</option>
        </select>

        <button class="btn btn-primary">
            Save User
        </button>

    </form>

</div>

@endsection