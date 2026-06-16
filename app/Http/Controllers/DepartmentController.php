<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    //
    public function index()
    {
        $departments = Department::latest()->get();

        return view('departments.index', compact('departments'));
    }
}
