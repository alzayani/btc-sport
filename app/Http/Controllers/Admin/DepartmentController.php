<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderByDesc('id')->paginate(5);
        return view('backend.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $department = Department::create(['name' => $request->name]);
        return response()->json($department);
    }

    public function edit(request $request)
    {
        $department = Department::find($request->sid);
        return response()->json([
            'department' => $department,
        ]);
    }

    public function update(Request $request)
    {
        $department = Department::find($request->department_id);
        $department->name = $request->name;
        $department->save();
        return response()->json($department);
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return response()->json(['message' => 'deleted successfully']);
    }
}
