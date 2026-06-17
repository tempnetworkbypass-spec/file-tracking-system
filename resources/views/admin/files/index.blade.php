@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Department Files</h2>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>File Number</th>
            <th>Remarks</th>
        </tr>

        @foreach($files as $file)

        <tr>
            <td>{{ $file->id }}</td>
            <td>{{ $file->file_name }}</td>
            <td>{{ $file->file_number }}</td>
            <td>{{ $file->remarks }}</td>
        </tr>

        @endforeach

    </table>

</div>

@endsection