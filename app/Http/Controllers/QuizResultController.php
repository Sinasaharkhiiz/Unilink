<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizResultController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'score' => 'required|integer',
            'answers' => 'required|array',
            'questions' => 'required|array', // اعتبارسنجی برای سوالات
        ]);

        $quizResult = new QuizResult([
            'user_id' => Auth::user()->id,
            'score' => $request->input('score'),
            'answers' => json_encode($request->input('answers')),
            'questions' => json_encode($request->input('questions')),
        ]);

        $quizResult->save();

        return response()->json(['message' => 'Result saved successfully'], 200);
    }
}
