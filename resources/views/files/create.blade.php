@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Create File</h2>

    <form action="{{ route('files.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Department</label>

            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>

                @foreach($departments as $department)
                <option value="{{ $department->id }}">
                    {{ $department->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>File Name</label>

            <input type="text"
                name="file_name"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Remarks</label>

            <textarea name="remarks"
                class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Save File
        </button>

    </form>

</div>

@endsection