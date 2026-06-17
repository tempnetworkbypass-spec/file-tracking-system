@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Files</h2>

    <a href="{{ route('files.create') }}"
        class="btn btn-primary mb-3">
        + Create File
    </a>

    <table class="table">

        <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>File Number</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        @foreach($files as $file)

        <tr>
            <td>{{ $file->id }}</td>
            <td>{{ $file->file_name }}</td>
            <td>{{ $file->file_number }}</td>
            <td>{{ $file->department->name ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('files.transfer.create', $file->id) }}"
                    class="btn btn-primary">
                    Send File
                </a>
            </td>
        </tr>

        @endforeach

    </table>

</div>

@endsection