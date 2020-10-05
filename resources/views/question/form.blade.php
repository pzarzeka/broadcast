@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="row align-items-center" style="height: 500px;">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    {{--<div class="panel-body">
                        <question-list :questions-accepted="questionsAccepted"></question-list>
                    </div>--}}
                    <div class="panel-footer">
                        <question-form
                            v-on:newquestion="addQuestion"
                            :user="{{ Auth::user() }}"
                        ></question-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
