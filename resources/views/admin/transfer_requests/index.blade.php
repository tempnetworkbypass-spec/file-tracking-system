@extends('layouts.app')

@section('content')
<h2>Transfer Requests</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">

    <tr>
        <th>File</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($requests as $request)

    <tr>

        <td>
            {{ $request->file_id }}
        </td>

        <td>
            <strong>
                {{ strtoupper($request->status) }}
            </strong>
        </td>

        <td>

            {{-- ONLY SHOW BUTTONS IF PENDING --}}
            @if($request->status == 'pending')

            <form action="{{ route('admin.transfer.approve', $request->id) }}"
                method="POST"
                style="display:inline-block">
                @csrf
                <button style="background:green;color:white">
                    Approve
                </button>
            </form>

            <form action="{{ route('admin.transfer.reject', $request->id) }}"
                method="POST"
                style="display:inline-block">
                @csrf
                <button style="background:red;color:white">
                    Reject
                </button>
            </form>

            @else
            <span style="color:blue">
                No action available
            </span>
            @endif

        </td>

    </tr>

    @endforeach

</table>

@endsection