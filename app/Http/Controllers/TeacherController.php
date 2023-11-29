<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    // Return a list of teachers
    public function index()
    {
        $teachers = Teacher::with(['locations', 'subjects'])->get();

        return response()->json(['teachers' => $teachers]);
    }

    public function subjects()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
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

        if ($request['name'] || $request['subjects'] ||  $request['region'] || $request['capital'] || $request['townships']) {
            $query = Teacher::with(['locations', 'subjects'])->filter(request(['name', 'subjects', 'region', 'capital', 'townships']))->orderBy('id', 'ASC');
            return response()->json(['teachers' => $query->get()]);
        } else {
            dd("No Data");
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'experience' => 'required|string',
            'experience_description' => 'required|string',
            'time' => 'required|string',
            'online_or_local' => 'required|boolean',
            'international_or_government' => 'required|boolean',
            'locations' => 'required|array',
            'locations.*' => 'exists:locations,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        // Create the teacher
        $teacher = Teacher::create($request->only([
            'name', 'age', 'experience', 'experience_description',
            'time', 'online_or_local', 'international_or_government',
        ]));

        // Attach locations and subjects
        $teacher->locations()->attach($request->input('locations'), ['township' => 'Township']);
        $teacher->subjects()->attach($request->input('subjects'));

        return response()->json(['teacher' => $teacher], 201);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'locations' => 'required|array',
            'locations.*' => 'exists:locations,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }
        // Detach existing relationships
        $teacher->locations()->detach();
        $teacher->subjects()->detach();

        // Attach new relationships
        $teacher->locations()->attach($request->input('locations'), ['township' => 'Township']);
        $teacher->subjects()->attach($request->input('subjects'));

        return response()->json(['message' => 'Teacher updated successfully']);
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        // Detach and delete related records
        $teacher->locations()->detach();
        $teacher->subjects()->detach();
        $teacher->delete();

        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
