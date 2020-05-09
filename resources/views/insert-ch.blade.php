
@extends('master3')
@section('content')
    <form  action="ins-ch" method="post" style="padding-top: 20vh;">
        <br>
        <h1>
            Insert Chapter
        </h1>
        {{csrf_field()}}
        <br>
        <input class="form-control" type="text" name="name" placeholder="Chapter Name ..."><br>
        <select class="custom-select mr-sm-2" id="subject" name="subject">
            @foreach ($rows as $x)
                <option value="{{$x->id}}">
                    {{$x->name}}
                </option>
            @endforeach
        </select>
        <br><br>
        <hr>
        <input class="btn btn-danger" type="submit" value="Insert">
    </form>
    <a href="Profile">
        <button class="btn btn-bd-download">
            Cancel
        </button>
    </a>
@stop
