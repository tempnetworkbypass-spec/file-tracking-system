@extends('layouts.app')

@section('content')

<div class="container">

    <h2>File Tracking Details</h2>

    <hr>

    <h4>File Information</h4>

    <p>
        <strong>File Name:</strong>
        {{ $file->file_name }}
    </p>

    <p>
        <strong>File Number:</strong>
        {{ $file->file_number }}
    </p>
    <p>
        <strong>Status:</strong>

        @if($file->status == 'active')
        Active
        @elseif($file->status == 'pending_transfer')
        Pending Approval
        @elseif($file->status == 'archived')
        Archived
        @else
        Draft
        @endif
    </p>

    <p>
        <strong>Department:</strong>
        {{ $file->department->name ?? 'N/A' }}
    </p>

    <p>
        <strong>Created By:</strong>
        {{ $file->creator->name ?? 'N/A' }}
    </p>

    <p>
        <strong>Current Holder:</strong>
        {{ $file->currentHolder->name ?? 'N/A' }}
    </p>

    <p>
        <strong>Created At:</strong>
        {{ $file->created_at }}
    </p>

    <hr>

    <h4>Transfer History</h4>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>From User</th>
                <th>To User</th>
                <th>From Department</th>
                <th>To Department</th>
                <th>Remarks</th>
            </tr>
        </thead>

        <tbody>

            @forelse($file->movements as $movement)
            <tr>
                <td>{{ $movement->created_at }}</td>

                <td>{{ ucfirst($movement->action) }}</td>

                <td>{{ $movement->fromUser->name ?? 'N/A' }}</td>

                <td>{{ $movement->toUser->name ?? 'N/A' }}</td>

                <td>{{ $movement->fromDept->name ?? 'N/A' }}</td>

                <td>{{ $movement->toDept->name ?? 'N/A' }}</td>

                <td>{{ $movement->remarks }}</td>
            </tr>
            @empty

            <tr>
                <td colspan="7">
                    No transfer history available.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection