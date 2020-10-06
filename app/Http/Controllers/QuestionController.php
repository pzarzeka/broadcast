<?php

namespace App\Http\Controllers;

use App\Events\AcceptedQuestion;
use App\Events\NewQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('question.form');
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function question($id = null)
    {
        return Question::where('accepted', false)->get();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $question = $user->questions()->create([
            'question' => $request->input('question')
        ]);

        broadcast(new NewQuestion($user, $question))->toOthers();

        return ['question' => $question];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function delete(Request $request)
    {
        $question = Question::find($request->get('questionId'));
        $question->delete();

        return ['question' => $question];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function accept(Request $request)
    {
        $question = Question::find($request->get('questionId'));
        $question->accepted = true;
        $question->save();

        broadcast(new AcceptedQuestion($question))->toOthers();

        return ['question' => $question];
    }

    /**
     * @return Question mixed
     */
    public function questionAccepted()
    {
        return Question::where('accepted', true)->get();
    }

}
