<?php

namespace App\Http\Controllers\Api;

use App\Events\NewQuestion;
use App\Http\Controllers\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $user = User::find(1);

        $question = $user->questions()->create([
            'question' => $request->input('question')
        ]);

        broadcast(new NewQuestion($user, $question))->toOthers();

        return ['question' => $question];
    }

}
