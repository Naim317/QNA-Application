@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h1>{{$question->title}}</h1>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                       <h5>{{ $question->body}}</h5>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

