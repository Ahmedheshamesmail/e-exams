@extends('master4')
@section('contain')
    <form style="margin-top: 13vh;font-size: 17px" action="" method="post">
        @foreach($quest as $q)
            <h1 class="hh">
                <div class="alert alert-success border-success">{{$q->text}}</div>
            </h1>
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group">
              @foreach($rowans as $ans)
                  @if($ans->question_id == $q->id)
                        {{$ans->text}}<br>
                        @if($ans->correct == 1)

                            correct


                            <br>
                      @endif
                        @if($ans->correct == 0)

                            wrong<br>
                        @endif
                    @endif
                  @endforeach
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{{$q->id}}/Questions">
            <button class="btn btn-secondary" type="button">
                Cancel
            </button>
        </a>
            @endforeach
    </form>
@stop
