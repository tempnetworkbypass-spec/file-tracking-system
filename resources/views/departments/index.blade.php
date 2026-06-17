@extends('layouts.app')

@section('content')

<div style="padding:20px;">

    <h1>Departments</h1>

    <a href="{{ route('departments.create') }}">
        + Add Department
    </a>

    <br><br>

    <form method="GET" action="{{ route('departments.index') }}">
        <input type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search department...">

        <button type="submit">Search</button>
    </form>

    <br>
    @if(session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
    @endif
    <table border="2 px" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->code }}</td>
                <td>
                    {{ $department->is_active ? 'Active' : 'Inactive' }}
                </td>

                <td>
                    <a href="{{ route('departments.edit', $department->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('departments.destroy', $department->id) }}"
                        method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No departments found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    {{ $departments->links() }}

</div>

@endsection