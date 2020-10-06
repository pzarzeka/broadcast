<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('speaker.question_list');
    }

}
