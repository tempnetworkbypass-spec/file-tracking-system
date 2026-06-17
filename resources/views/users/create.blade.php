@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Create Admin User</h2>

    <form method="POST"
        action="{{ route('users.store') }}">

        @csrf

        <div class="mb-3">
            <label>Name</label>

            <input type="text"
                name="name"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Email</label>

            <input type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Password</label>

            <input type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Department</label>

            <select name="department_id"
                class="form-control">

                @foreach($departments as $department)

                <option value="{{ $department->id }}">
                    {{ $department->name }}
                </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Designation</label>

            <select name="designation_id"
                class="form-control">

                @foreach($designations as $designation)

                <option value="{{ $designation->id }}">
                    {{ $designation->name }}
                </option>

                @endforeach

            </select>
        </div>

        <input type="hidden"
            name="role"
            value="admin">

        <button class="btn btn-success">
            Create Admin
        </button>

    </form>

</div>

@endsection