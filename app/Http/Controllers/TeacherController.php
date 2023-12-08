<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    // Return a list of teachers
    public function index(Request $request)
    {
        $teachers = Cache::remember('default_teacher_' . $request->page, 120, function () use ($request) {
            $query = Teacher::with(['locations', 'subjects']);
            $count = $query->count();
            $teachers = $query->paginate($request->per_page ?? 12);
            return ['teachers' => $teachers, 'count' => $count];
        });
        return response()->json($teachers);
    }

    public function topteacher()
    {
        $teachers = Cache::remember('top_teacher', 60 * 5, function () {
            return Teacher::with(['locations', 'subjects'])->take(4)->get();
        });
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
        $teacher = Cache::remember('show_teacher_' . $id, 60 * 5, function () use ($id) {
            return Teacher::with(['locations', 'subjects'])->find($id);
        });

        if (!$teacher) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }

        return response()->json(['teacher' => $teacher]);
    }

    // Return teachers based on multiple search criteria
    public function search(Request $request)
    {
        if ($request['name'] || $request['subjects'] ||  $request['region'] || $request['capital'] || $request['townships'] || $request['status'] || $request['environment']) {
            $query = Teacher::with(['locations', 'subjects'])->filter(request(['name', 'subjects', 'region', 'capital', 'townships', 'status', 'environment']))->orderBy('id', 'ASC');
            $searchCount = $query->count();
            $teacher = $query->paginate($request['per_page'] ?? 12, ['*'], '', $request['page']);
            return response()->json(['teachers' => $teacher, 'searchCount' => $searchCount]);
        } else {
            return response()->json(['teachers' => 'no data']);
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
