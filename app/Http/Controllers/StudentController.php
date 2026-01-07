<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'course' => 'required'
        ]);

        Student::create($request->all());

        return redirect('/students')->with('success', 'Student added successfully');
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'course' => 'required'
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect('/students')->with('success', 'Student updated successfully');
    }


    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        Student::findOrFail($id)->delete();
        return redirect('/students')->with('success', 'Student deleted');
    }
}
