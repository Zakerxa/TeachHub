<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class ReviewController extends Controller
{

    public function index($token)
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
                'token' => ['required'],
                '_token' => ['required']
            ]);
        } catch (ValidationException $th) {
            return $th;
        }

        if ($review['token'] == 'new') {
            $string     = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
            $review['token'] = substr(str_shuffle($string), 0, 12) . '-' . rand(10000, 99999);
            $ContactForm = Review::create($review);
            session()->regenerateToken();
            if ($ContactForm) return response()->json(['response' => 'success', 'data' => $ContactForm, 'token' =>  $review['token']]);
            else return response()->json(['response' => 'error']);
        } else {
            $ContactForm = Review::create($review);
            session()->regenerateToken();
            if ($ContactForm) return response()->json(['response' => 'success', 'data' => $ContactForm, 'token' =>  null]);
            else return response()->json(['response' => 'error']);
        }
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
