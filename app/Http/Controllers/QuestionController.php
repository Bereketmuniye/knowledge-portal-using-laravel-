<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
   public function index()
    {
        $users = User::all();
        $questions = Question::latest()->paginate(10);

        return view('questions.index', compact('users'))
            ->with('questions', $questions);
    }

public function create()
{
    return view('questions.create');
}

public function store(Request $request)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    $question = new Question();
    $question->body = $request->input('body');
    $question->asked_by = auth()->id();
    $question->save();

    return redirect()->route('questions.index', $question);
}

public function show(Question $question)
{
    $question->load('askedBy', 'answers.answeredBy');
    return view('questions.show', compact('question'));
}
}
