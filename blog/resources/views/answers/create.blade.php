<div class="container">
    <div class="row mt-3">
        <div class="com-md-12">
            <div class="card">
                <div class="card-dody">
                    <div class="card-title">
                       <h3 class="ml-2">Your Answer</h3>
                    </div>
                    <hr>
                    <form action="{{route('questions.answers.store', $question->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="" cols="300" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}"></textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$error->first('body')}}</strong>
                                </div>


                                @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>


                </div>
            </div>
        </div>
    </div>



