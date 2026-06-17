@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Create Designation</h2>

    <form method="POST" action="{{ route('designations.store') }}">
        @csrf

        <!-- Department -->
        <div>
            <label>Department</label>
            <select name="department_id" required>
                <option value="">Select Department</option>

                @foreach($departments as $dept)
                <option value="{{ $dept->id }}">
                    {{ $dept->name }}
                </option>
                @endforeach
            </select>
        </div>

        <br>

        <!-- Designation Name -->
        <div>
            <label>Designation Name</label>
            <input type="text" name="name" required>
        </div>

        <br>

        <!-- Status -->
        <div>
            <label>Status</label>
            <select name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <br>

        <button type="submit">Save</button>
    </form>

</div>

@endsection