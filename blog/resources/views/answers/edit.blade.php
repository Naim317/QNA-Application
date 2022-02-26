@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row mt-3">
        <div class="com-md-12">
            <div class="card">
                <div class="card-dody">
                    <div class="card-title">
                        <h1><u>Edit Answer for question:</u> <strong>{{$question->title}}</strong></h1>
                    </div>
                    <hr>
                    <form action="{{route('questions.answers.update', [$question->id, $answer->id])
}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <textarea name="body" id="" cols="300" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}">{{old('body', $answer->body)}}</textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$error->first('body')}}</strong>
                                </div>


                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Update Answer</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection




