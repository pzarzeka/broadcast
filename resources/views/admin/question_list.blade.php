@extends('layouts.index')

@section('content')

    <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-footer">
                <admin-question-list :questions="questions"></admin-question-list>
            </div>
        </div>
    </div>
@endsection
