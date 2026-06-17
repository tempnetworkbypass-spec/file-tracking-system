<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Department;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function index()
    {
        $designations = Designation::with('department')
            ->latest()
            ->paginate(10);

        return view('designations.index', compact('designations'));
    }

    // SHOW CREATE PAGE
    public function create()
    {
        $departments = Department::all();
        return view('designations.create', compact('departments'));
    }

    // STORE DATA (THIS FIXES YOUR ERROR)
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required|string|max:255',
            'status' => 'required'
        ]);

        Designation::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'is_active' => $request->status,   // ✅ FIXED
        ]);

        return redirect()->route('designations.index');
    }

    // EDIT
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        $departments = Department::all();

        return view('designations.edit', compact('designation', 'departments'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'status' => 'required'
        ]);

        $designation = Designation::findOrFail($id);

        $designation->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'is_active' => $request->status,   // ✅ FIXED
        ]);

        return redirect()->route('designations.index')
            ->with('success', 'Designation updated successfully');
    }

    // DELETE
    public function destroy($id)
    {
        Designation::findOrFail($id)->delete();

        return redirect()->route('designations.index')
            ->with('success', 'Designation deleted successfully');
    }
}
