@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Transfer File</h2>

    <form action="{{ route('files.transfer.store') }}" method="POST">

        @csrf

        <input type="hidden"
            name="file_record_id"
            value="{{ $file->id }}">

        <div class="mb-3">
            <label>Select User</label>

            <select name="to_user_id"
                class="form-control">

                @foreach($users as $user)

                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Remarks</label>

            <textarea name="remarks"
                class="form-control"></textarea>
        </div>

        <button class="btn btn-success">
            Transfer
        </button>

    </form>

</div>

@endsection