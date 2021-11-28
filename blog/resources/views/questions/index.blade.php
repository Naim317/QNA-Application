@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary"> Ask A Question </a>
                        </div>
                    </div>
                    </div>


                    <div class="card-body">
                        @include('layouts._messages')

                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counter">
                                    <div class="vote">
                                        <strong> {{$question->votes}} </strong> {{str_plural('vote',$question->votes)  }}
                                    </div>

                                    <div class="status {{$question->status}}">
                                        <strong> {{$question->answers_count}} </strong> {{str_plural('answer',$question->answers_count)  }}
                                    </div>

                                    <div class="view">
                                         {{$question->views . " " . str_plural('view',$question->views)  }}
                                    </div>
                                </div>
                                <div class="media-body align-item-center">
                                    <div class="d-flex">
                                        <h3 class="mt-0">
                                            <a href="{{$question->url}}">{{str_limit($question->title, 48)}}</a>

                                        </h3>
                                        <div class="ml-auto">
                                            @if(Auth::user()->can('update-question', $question))
                                            <a href="{{route('questions.edit', $question->id)}}" class = "btn btn-sm btn-outline-info">Edit</a>
                                            @endif

                                                @if(Auth::user()->can('delete-question', $question))
                                            <form class="form-delete"  method="post" action="{{route('questions.destroy', $question->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure')">Delete</button>
                                            </form>
                                                @endif


                                        </div>

                                    </div>
                                    <p class="lead">
                                        Asked By
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_at}}</small>
                                    </p>

                                    {{str_limit($question->body, 250)}}

                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{$questions->links() }}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
