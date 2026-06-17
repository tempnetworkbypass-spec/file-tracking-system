@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Admin Users</h2>

    <a href="{{ route('users.create') }}"
        class="btn btn-primary mb-3">
        Create Admin
    </a>

    <table class="table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Department</th>
            </tr>
        </thead>

        <tbody>

            @foreach($users as $user)

            <tr>
                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>{{ $user->role }}</td>

                <td>
                    {{ $user->department->name ?? '-' }}
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection