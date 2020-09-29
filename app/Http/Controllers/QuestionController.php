<?php

namespace App\Http\Controllers;

use App\Events\AcceptedQuestion;
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

        return ['question' => $question];
    }

    public function edit()
    {

    }

    public function delete()
    {

    }

    public function accept(Request $request)
    {
//        dd($request->all());
        $question = Question::find($request->get('questionId'));
//        dd($question);
        $question->accepted = true;
        $question->save();

        broadcast(new AcceptedQuestion($question))->toOthers();

        return ['question' => $question];
    }

    public function questionAccepted()
    {
        return Question::where('accepted', true)->get();
    }

}
