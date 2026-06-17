<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileRecord;

class AdminFileController extends Controller
{
    public function index()
    {
        $files = FileRecord::where(
            'department_id',
            auth()->user()->department_id
        )->latest()->get();

        return view(
            'admin.files.index',
            compact('files')
        );
    }
}
