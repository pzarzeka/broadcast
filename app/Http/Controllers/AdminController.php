<?php


namespace App\Http\Controllers;


class AdminController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('admin.question_list');
    }

}
