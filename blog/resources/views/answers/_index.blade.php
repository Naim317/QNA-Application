<div class="container">
    <div class="row mt-3">
        <div class="com-md-12">
            <div class="card">
                <div class="card-dody">
                    <div class="card-title">
                        <h2 class="ml-2">{{$question->answers_count . " " . str_plural('Answer', $question->answers_count)}}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')
                    @foreach ($question->answers as $answer)
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a href="" title="This answer is useful" class="vote-up"><i class="fa fa-caret-up fa-3x" ></i>
                                    <span class="votes-count">1234</span></a>

                                <a href="" title="This answer is not useful" class="vote-down off"><i class="fa fa-caret-down fa-3x" ></i></a>
                                <a href="" title="Mark this answer as the best answer" class="{{$answer->status}}"><i class="fa fa-check fa-2x" ></i>
                                </a>


                            </div>
                            <div class="media-body">
                                {!! $answer->body !!}
                                <div class="row">
                                    <div class="col-4 mt-4">
                                        <div class="ml-auto">
                                            @if(Auth::user()->can('update-answer', $answer))
                                                <a href="{{route('questions.answers.edit', [$question->id,$answer->id])}}" class = "btn btn-sm btn-outline-info">Edit</a>
                                            @endif

                                            @if(Auth::user()->can('delete-answer', $answer))
                                                <form class="form-delete"  method="post" action="{{route('questions.answers.destroy', [$question->id,$answer->id])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure')">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-4">
                                    </div>
                                    <div class="col-4">
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

                        </div>
                        <hr>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


