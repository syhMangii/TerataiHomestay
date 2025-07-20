<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FlipchartController extends Controller
{
    public function flipchart()
    {
        $user = auth()->user();


        // Load JSON questions
        $jsonPath = resource_path('json/flipchart_quiz_questions.json');
        $content = File::get($jsonPath);
        $allQuestions = collect(json_decode($content, true));

        // Randomly pick 5 questions
        $selectedQuestions = $allQuestions->shuffle()->take(5)->map(function ($q) {
            $options = ['A' => 'Betul', 'B' => 'Salah'];
            // shuffle($options); // Randomize option order
            return [
                'id' => $q['id'],
                'question' => $q['question'],
                'options' => $options,
            ];
        })->values()->toArray();

        return view('checkin.flipchart', [
            'isRead' => $user->is_read,
            'questions' => $selectedQuestions,
            'quizResult' => session('quiz_result'), // pass result to Blade
        ]);
    }

    public function welcome()
{
    return view('checkin.flipchart0');
}


public function flipchart2()
{
    $user = auth()->user();

    $jsonPath = resource_path('json/flipchart_quiz_questions.json');
    $content = File::get($jsonPath);
    $allQuestions = collect(json_decode($content, true));

    $selectedQuestions = $allQuestions->shuffle()->take(5)->map(function ($q) {
        return [
            'id' => $q['id'],
            'question' => $q['question'],
            'options' => ['A' => 'Betul', 'B' => 'Salah'], // Fixed order
        ];
    })->values()->toArray();

    return view('checkin.flipchart2', [
        'isRead' => $user->is_read,
        'questions' => $selectedQuestions,
        'quizResult' => session('quiz_result'),
    ]);
}


    public function submitQuiz(Request $request)
    {
        // Load correct answers
        $jsonPath = resource_path('json/flipchart_quiz_questions.json');
        $content = File::get($jsonPath);
        $allQuestions = collect(json_decode($content, true));
        $correctAnswers = $allQuestions->pluck('correct', 'id')->toArray();

        $answers = $request->input('answers');
        $correctCount = 0;

        foreach ($answers as $id => $userAnswer) {
            if (isset($correctAnswers[$id]) && $userAnswer === $correctAnswers[$id]) {
                $correctCount++;
            }
        }

        // Flash result and update user if passed
        if ($correctCount >= 3) {
            auth()->user()->update(['is_read' => true]);
            session()->flash('quiz_result', 'pass');
        } else {
            session()->flash('quiz_result', 'fail');
        }
            session()->flash('quiz_score', $correctCount); // <-- new line

    return redirect()->back();
    }

    public function confirmRead()
{
    $user = Auth::user();
    $user->is_read = true;
    $user->save();

    return redirect()->back()->with('success', 'Your confirmation has been recorded.');
}


}
