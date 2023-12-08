<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class ReviewController extends Controller
{


    public function index()
    {
        $reviews = Cache::remember('reviews', 30, function () {
            return  Review::where('status', 1)->OrderBy('id', 'desc')->get();
        });
        return response()->json(['data' => $reviews]);
    }

    public function requestReview(Request $request)
    {
        try {
            $pending = $request->validate([
                'id' => ['required'],
                'password' => ['required'],
                'token' => ['required'],
                '_token' => ['required'],
            ]);
        } catch (ValidationException $th) {
            return $th;
        }


        if ($pending['token'] == 'null') return null;

        $form = Review::where('id', $pending['id'])->where('status', 0)->where('token', $pending['token'])->first();

        session()->regenerateToken();

        if ($form) {
            if (Hash::check($pending['password'], $form->password)) {
                return response()->json(['response' => 'correct']);
            } else {
                return response()->json(['response' => 'Password is incorrect.']);
            }
        }
    }

    public function reviewsWithPending($token)
    {

        if ($token == 'null')  $reviews = Review::where('status', 1)->OrderBy('id', 'desc')->get();
        else $reviews = Review::where('status', 1)->orWhere(function ($query) use ($token) {
            $query->where('status', 0)->where('token', $token);
        })->OrderBy('id', 'desc')->get();

        session()->regenerateToken();

        if ($reviews) return response()->json(['data' => $reviews]);
    }

    public function store(Request $request)
    {
        try {
            $review = $request->validate([
                'name' => ['required', 'min:1', 'max:100'],
                'message' => ['required'],
                'rating' => ['required'],
                '_token' => ['required']
            ]);
        } catch (ValidationException $th) {
            return $th;
        }

        session()->regenerateToken();

        $review['status'] = 1;

        $ContactForm = Review::create($review);


        if ($ContactForm) return response()->json(['response' => 'success','data' => $ContactForm]);

        else return response()->json(['response' => 'error']);
    }

    public function destory(Request $request)
    {
        try {
            $formData = $request->validate([
                'id' => ['required'],
                'password' => ['required'],
                'token' => ['required'],
                '_token' => ['required'],
            ]);
        } catch (ValidationException $th) {
            return $th;
        }

        if ($formData['token'] == 'null') return response()->json(['response' => 'error']);

        $form = Review::find($formData['id']);

        session()->regenerateToken();

        if ($form) {
            if (Hash::check($formData['password'], $form->password)) {
                $form->delete();
                return response()->json(['response' => 'success']);
            }
        } else return response()->json(['response' => 'error']);
    }
}
