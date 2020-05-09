@extends('master')

@section('content')
    <form  action="lev" method="post" style="margin:auto">
        <br><br>
        <h1>
            Insert Level
        </h1>
        {{csrf_field()}}
        <br>
        <br>
        <label for="name" style="font-size:20px;">Name</label>
        <br>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your Name ...">
        <br>
        <br><hr>
        <input class="btn btn-danger" type="submit" value="Insert">
        <a href="Levels" style="float:right">
            <button type="button" class="btn">Cancel</button>
        </a>
    </form>
@stop
