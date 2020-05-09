@extends('master')

@section('content')
        <form  action="dep" method="post" style="margin:auto">
            <br><br>
            <h1>
                Insert Department
            </h1>
           {{csrf_field()}}
           <br>
            <br>
           <label for="name" style="font-size:20px;">Name</label>
           <br>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter Department ...">

                    <br>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level">
                        @foreach ($rowl as $x)
                        <option value="{{$x->id}}">
                            {{$x->name}}
                        </option>
                        @endforeach
                    </select>
                    <br><br>
                    <br><hr>
                    <input class="btn btn-danger" type="submit" value="Insert">
            <a href="Departments" style="float:right">
                <input class="btn btn-block" type="button" value="Cancel">
            </a>
        </form>
@stop
