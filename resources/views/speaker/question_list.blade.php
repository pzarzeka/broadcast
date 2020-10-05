@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-footer">
                        <question-list :questions-accepted="questionsAccepted"></question-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
