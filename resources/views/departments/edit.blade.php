@extends('layouts.app')

@section('content')

<div style="max-width:600px; margin:auto; padding:20px;">

    <h1>Edit Department</h1>

    <form method="POST" action="{{ route('departments.update', $department->id) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div style="margin-bottom:15px;">
            <label>Department Name</label><br>
            <input type="text"
                name="name"
                value="{{ old('name', $department->name) }}"
                style="width:100%; padding:8px;">
        </div>

        <!-- Code -->
        <div style="margin-bottom:15px;">
            <label>Department Code</label><br>
            <input type="text"
                name="code"
                value="{{ old('code', $department->code) }}"
                style="width:100%; padding:8px;">
        </div>

        <!-- Status -->
        <div style="margin-bottom:15px;">
            <label>Status</label><br>
            <select name="is_active" style="width:100%; padding:8px;">
                <option value="1" {{ $department->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$department->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit"
            style="background:blue; color:white; padding:10px 15px;">
            Update Department
        </button>

    </form>

</div>

@endsection