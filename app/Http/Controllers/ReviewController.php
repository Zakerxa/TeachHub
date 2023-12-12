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
            return  Review::where('status', 2)->OrderBy('id', 'desc')->get();
        });
        return response()->json(['data' => $reviews]);
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

        $review['status'] = 2;

        $ContactForm = Review::create($review);


        if ($ContactForm) return response()->json(['response' => 'success','data' => $ContactForm]);

        else return response()->json(['response' => 'error']);
    }
}
