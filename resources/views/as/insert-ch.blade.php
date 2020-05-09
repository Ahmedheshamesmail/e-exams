
@extends('as.master3')
@section('content')
    <form  action="ins-cha" method="post" style="padding-top: 20vh;">
        <br>
        <h1>
            اضافه فصل
        </h1>
        {{csrf_field()}}
        <br>
        <input class="form-control" type="text" name="name" placeholder="اسم الفصل .."><br>
        <select class="custom-select mr-sm-2" id="subject" name="subject">
            @foreach ($rows as $x)
                <option value="{{$x->id}}">
                    {{$x->name}}
                </option>
            @endforeach
        </select>
        <br><br>
        <hr>
        <input class="btn btn-danger" type="submit" value="اضافه">
    </form>
    <a href="Profilea">
        <button class="btn btn-bd-download">
           إلغاء
        </button>
    </a>
@stop
