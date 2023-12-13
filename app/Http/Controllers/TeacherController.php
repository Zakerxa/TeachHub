<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    // Return a list of teachers
    public function index(Request $request)
    {
        $teachers = Cache::remember('default_teacher_' . $request->page, 10, function () use ($request) {
            $query = Teacher::with(['locations', 'subjects']);
            $count = $query->count();
            $teachers = $query->orderBy('id', 'desc')->paginate($request->per_page ?? 12);
            return ['teachers' => $teachers, 'count' => $count];
        });
        return response()->json($teachers);
    }

    public function topteacher()
    {
        $teachers = Cache::remember('top_teacher_list', 10, function () {
            return Teacher::with(['locations', 'subjects'])->orderBy('experience', 'desc')->take(4)->get();
        });
        return response()->json(['teachers' => $teachers]);
    }

    public function subjects()
    {
        $subjects = Subject::where('status', 1)->get();
        return response()->json($subjects);
    }

    // Return a specific teacher
    public function show($id)
    {
        $teacher = Cache::remember('show_teacher_' . $id, 10, function () use ($id) {
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

        try {
            $request->validate([
                'name' => 'required|string',
                'name_mm' => 'required|string',
                'age' => 'required|numeric',
                'pic.*' => ['mimes:jpg,png,jpeg,svg'],
                'region' => 'required',
                'township' => 'required',
                'subjects' => 'required|array',
                'subjects.*' => 'exists:subjects,id',
                'experience' => 'required',
                'time_table_1' => 'required|string',
                'time_table_1_mm' => 'required|string',
                'description' => 'required|string',
                'description_mm' => 'required|string',
                'online_or_local' => 'required|numeric',
                'environment' => 'required|numeric',
                'environment_mm' => 'required|numeric',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }

        //  Random Token
        $string     = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
        $shuffle    = str_shuffle($string);
        $token       = random_int(10000, 99999) . '-' . substr($shuffle, 0, 12) . '-' . rand(1000, 9999);

        $request['token'] = $token;

        $imagepath  = public_path("/uploads/profile/$token");
        // File Input System
        if (!file_exists($imagepath)) {
            if (!mkdir($imagepath, 0777, true)) die('Failed to create folders...');
            else chmod("$imagepath", 0777);
        }

        $images = [];
        if ($request->hasFile('pic')) {
            foreach ($request->file('pic') as $image) {
                $fileName = rand(1000, 9999) . '-' . $image->getClientOriginalName();
                $image->move($imagepath, $fileName);
                $images = $fileName;
            }
        }

        // Create the teacher without including 'pic' in the $request->only() call
        $teacher = $request->only([
            'name', 'name_mm', 'age', 'token', 'experience', 'time_table_1', 'time_table_1_mm',
            'time_table_2', 'time_table_2_mm', 'online_or_local', 'environment', 'environment_mm', 'description', 'description_mm'
        ]);

        $teacher['pic'] = $images;

        $townships =  explode(',', implode($request->township));
        $townships_mm =  explode(',', implode($request->township_mm));
        $subjects =  explode(',', implode($request->subjects));

        // Create the teacher
        $teacher = Teacher::create($teacher);

        // Attach locations and subjects
        foreach ($townships as $key => $township) {
            $teacher->locations()->create(['region_state' => $request->region, 'region_state_mm' => $request->region_mm, 'capital' => '200', 'township' => $township, 'township_mm' => $townships_mm[$key]]);
        }

        foreach ($subjects as $key => $subject) {
            $teacher->subjects()->attach($subject);
        }

        if ($teacher)   return response()->json('success', 201);

        else  return response()->json('error');
    }

    public function update(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required',
                'name' => 'required|string',
                'name_mm' => 'required|string',
                'age' => 'required|numeric',
                'pic.*' => ['mimes:jpg,png,jpeg,svg'],
                'region' => 'required',
                'township' => 'required',
                'subjects' => 'required|array',
                'subjects.*' => 'exists:subjects,id',
                'experience' => 'required',
                'time_table_1' => 'required|string',
                'time_table_1_mm' => 'required|string',
                'description' => 'required|string',
                'description_mm' => 'required|string',
                'online_or_local' => 'required|numeric',
                'environment' => 'required|numeric',
                'environment_mm' => 'required|numeric',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }

        $teacher = Teacher::findOrFail($request->id);

        $token = $teacher->token;

        if (empty($token)) {
            //  Random Token
            $string     = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
            $shuffle    = str_shuffle($string);
            $token       = random_int(10000, 99999) . '-' . substr($shuffle, 0, 12) . '-' . rand(1000, 9999);
        }

        $request['token'] = $token;

        $teacherUpdate = $request->only([
            'name', 'name_mm', 'age', 'token', 'experience', 'time_table_1', 'time_table_1_mm',
            'time_table_2', 'time_table_2_mm', 'online_or_local', 'environment', 'environment_mm', 'description', 'description_mm'
        ]);

        if ($request->hasFile('pic')) {

            $imagepath  = public_path("/uploads/profile/$token");
            // File Input System
            if (!file_exists($imagepath)) {
                if (!mkdir($imagepath, 0777, true)) die('Failed to create folders...');
                else chmod("$imagepath", 0777);
            }

            // Get all files in the folder
            $files = File::files($imagepath);

            // Delete each file
            foreach ($files as $file) {
                File::delete($file);
            }

            $images = [];
            if ($request->hasFile('pic')) {
                foreach ($request->file('pic') as $image) {
                    $fileName = rand(1000, 9999) . '-' . $image->getClientOriginalName();
                    $image->move($imagepath, $fileName);
                    $images = $fileName;
                }
            }

            $teacherUpdate['pic'] = $images;
        }



        // Detach existing relationships
        $teacher->subjects()->detach();

        $townships = implode(',', $request->township);
        $townships_mm = implode(',', $request->township_mm);
        $subjects = implode(',', $request->subjects);

        // Later if you want to use them as arrays again, you can explode them
        $townshipsArray = explode(',', $townships);
        $townships_mmArray = explode(',', $townships_mm);
        $subjectsArray = explode(',', $subjects);

        $existLocationIds = $teacher->locations()
            ->where('region_state', $request->region)
            ->whereIn('township', $townshipsArray)->get();

        $teacher->locations()
            ->where('region_state', $request->region)
            ->whereNotIn('township', $townshipsArray)->delete();

        // Get existing location IDs as an array
        $existingTownEN = $existLocationIds->pluck('township')->toArray();
        $existingTownMM = $existLocationIds->pluck('township_mm')->toArray();

        // Get new location IDs by finding the difference
        $newLocationTownEN = array_diff($townshipsArray, $existingTownEN);
        $newLocationTownMM = array_diff($townships_mmArray, $existingTownMM);

        // Add new locations if there are any
        foreach ($newLocationTownEN as $key => $newId) {
            $teacher->locations()->create([
                'region_state' => $request->region,
                'region_state_mm' => $request->region_mm,
                'capital' => '200',
                'township' => $newLocationTownEN[$key],
                'township_mm' => $newLocationTownMM[$key],
            ]);
        }

        foreach ($subjectsArray as $key => $subject) {
            $teacher->subjects()->attach($subject);
        }

        $status = $teacher->update($teacherUpdate);

        if ($status) return response()->json('success');
    }

    public function destroy(Request $request)
    {
        $ids = $request->input('ids', []); // Assuming 'ids' is the parameter name

        // Find and delete teachers
        Teacher::whereIn('id', $ids)->get()->each(function ($teacher) {
            $imagePath = public_path("/uploads/profile/$teacher->token");
            // Delete the teacher's folder and its contents
            if (File::exists($imagePath)) {
                File::deleteDirectory($imagePath);
            }
            // Detach subjects (many-to-many relationship)
            $teacher->subjects()->detach();
            // Delete locations (one-to-many relationship)
            $teacher->locations()->delete();
            // Delete the teacher
            $teacher->delete();
        });

        return response()->json(['success']);
    }
}
