@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Create User</h2>

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

        <select name="designation_id" class="form-control mb-2">

            @foreach($designations as $designation)

            <option value="{{ $designation->id }}">
                {{ $designation->name }}
            </option>

            @endforeach

        </select>

        <button class="btn btn-primary">
            Save User
        </button>

    </form>

</div>

@endsection