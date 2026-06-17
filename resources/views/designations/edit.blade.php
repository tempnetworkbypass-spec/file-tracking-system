@extends('layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Edit Designation</h2>

    <form method="POST" action="{{ route('designations.update', $designation->id) }}">
        @csrf
        @method('PUT')

        <!-- Department -->
        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" required class="border p-2 w-full">

                @foreach($departments as $dept)
                <option value="{{ $dept->id }}"
                    {{ $designation->department_id == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
                @endforeach

            </select>
        </div>

        <!-- Designation Name -->
        <div class="mb-3">
            <label>Designation Name</label>
            <input type="text"
                name="name"
                value="{{ $designation->name }}"
                class="border p-2 w-full"
                required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="border p-2 w-full" required>

                <option value="1" {{ $designation->status == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ $designation->status == 0 ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>
        </div>

        <button type="submit">
            Update
        </button>

    </form>

</div>

@endsection