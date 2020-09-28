<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\NewQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('question.form');
    }

    public function question($id = null)
    {
        return Question::all();
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $question = $user->questions()->create([
            'question' => $request->input('question')
        ]);

        broadcast(new NewQuestion($user, $question))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function edit()
    {

    }

    public function delete()
    {

    }

    public function status()
    {

    }

}
