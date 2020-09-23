@extends('layouts.index')

@section('content')

    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Questions</div>
                    <div class="">Below you can see only accepted questions</div>

                    <div class="panel-body">
                        <questions-list :questions="questions"></questions-list>
                    </div>
                    <div class="panel-footer">
                        <question-form
                            v-on:questionsent="addQuestion"
                            :user="{{ Auth::user() }}"
                        ></question-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
