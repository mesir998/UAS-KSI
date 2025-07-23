<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Simpan data Student baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string|unique:students,nim',
            'study_program' => 'required|string',
            'enrollment_year' => 'required|integer',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student
        ]);
    }

    // Tampilkan data Student berdasarkan ID (pakai route model binding)
    public function show(Student $student)
    {
        return response()->json([
            'message' => 'Student found',
            'data' => $student
        ]);
    }
}
