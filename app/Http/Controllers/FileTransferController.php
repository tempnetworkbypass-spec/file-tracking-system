<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileRecord;
use App\Models\FileTransfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TransferRequest;

class FileTransferController extends Controller
{
    public function create($fileId)
    {
        $file = FileRecord::findOrFail($fileId);
        $users = User::where('department_id', $file->department_id)->get();

        return view('files.transfer', compact('file', 'users'));
    }

    // STORE TRANSFER
    public function store(Request $request)
    {
        $request->validate([
            'file_record_id' => 'required',
            'to_user_id' => 'required',
        ]);

        $file = FileRecord::findOrFail(
            $request->file_record_id
        );

        $targetUser = User::findOrFail(
            $request->to_user_id
        );

        // Cross Department Transfer
        if (
            $targetUser->department_id
            != auth()->user()->department_id
        ) {

            TransferRequest::create([

                'file_id' => $file->id,

                'requested_by' => auth()->id(),

                'from_department' => auth()->user()->department_id,

                'to_department' => $targetUser->department_id,

                'target_user' => $targetUser->id,

                'status' => 'pending'
            ]);

            return back()->with(
                'success',
                'Transfer request sent for Admin approval'
            );
        }

        // Same Department Transfer
        FileTransfer::create([

            'file_record_id' => $file->id,

            'from_user_id' => auth()->id(),

            'to_user_id' => $targetUser->id,

            'from_department_id' => auth()->user()->department_id,

            'to_department_id' => $targetUser->department_id,

            'remarks' => $request->remarks,
        ]);

        $file->update([
            'current_user_id' => $targetUser->id
        ]);

        return redirect()
            ->route('files.index')
            ->with(
                'success',
                'File transferred successfully'
            );
    }
}
