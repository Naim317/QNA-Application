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
                        <div class="float-right">
                            <span class="text-muted">Question at {{$question->created_at}}</span>
                            <div class="media mt-2">
                                <a href="{{$question->user->url}}" class="pr-2">
                                    <img src="{{$question->user->avatar}}" alt="">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


<div class="container">
    <div class="row mt-3">
        <div class="com-md-12">
            <div class="card">
                <div class="card-dody">
                    <div class="card-title">
                        <h2>{{$question->answers_count . " " . str_plural('Answer', $question->answers_count)}}</h2>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)
                        <div class="media">
                            <div class="media-body">
                                {!! $answer->body !!}
                                <div class="float-right mt-4">
                                    <span class="text-muted">Answered {{$answer->created_at}}</span>
                                    <div class="media mt-2">
                                        <a href="{{$answer->user->url}}" class="pr-2">
                                            <img src="{{$answer->user->avatar}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>

                        @endforeach

                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection

