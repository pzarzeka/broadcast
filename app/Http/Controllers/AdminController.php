<?php


namespace App\Http\Controllers;


class AdminController
{

    public function questionList()
    {
        return view('admin.question_list');
    }

}
