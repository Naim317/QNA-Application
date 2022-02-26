@extends('layouts.app')
@section('title', 'QNA Application')
@section('content')
    <div class=" ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">


                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h1>{{$question->title}}</h1>
                                <div class="ml-auto">
                                    <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a href="" title="This question is useful" class="vote-up"><i class="fa fa-caret-up fa-3x" ></i>
                                    <span class="votes-count">1234</span></a>

                                <a href="" title="This question is not useful" class="vote-down off"><i class="fa fa-caret-down fa-3x" ></i></a>
                                <a href="" title="Click here to mark as favorite question(Click again to undo)" class="favorite mt-2 favorited"><i class="fa fa-star fa-2x" ></i>
                                    <span class="favorites-count">123</span>
                                </a>


                            </div>
                            <div class="media-body">
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
            </div>
        </div>
    </div>
    @include('answers._index', [
    'answers' => $question->answers,
    'answersCount' => $question->answers_count,
])
    @include('answers.create')





@endsection

