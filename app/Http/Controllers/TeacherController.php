<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // Return a list of teachers
    public function index()
    {
        $teachers = Teacher::with(['locations', 'subjects'])->get();

        return response()->json(['teachers' => $teachers]);
    }

    // Return a specific teacher
    public function show($id)
    {
        $teacher = Teacher::with(['locations', 'subjects'])->find($id);

        if (!$teacher) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }

        return response()->json(['teacher' => $teacher]);
    }

    // Return teachers based on multiple search criteria
    public function search(Request $request)
    {

        if ($request['name'] || $request['subjects'] || $request['locations']) {
            $query = Teacher::with(['locations', 'subjects'])->filter(request(['name', 'subjects', 'locations']))->orderBy('id', 'ASC');
        }

        $teachers = $query->get();

        return response()->json(['teachers' => $teachers]);
    }
}
