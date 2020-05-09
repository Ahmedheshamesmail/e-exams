
@extends('as.master')

@section('content')
        <form  action="suba" method="post" style="margin:auto">
            <br>
            <h1>
               إضافة ماده
            </h1>
           {{csrf_field()}}
            <br>
            <input class="form-control" type="text" name="name" placeholder="اسم الماده .."><br>
            <select class="custom-select mr-sm-2" id="prof" name="prof">
                @foreach ($rowp as $x)
                <option value="{{$x->id}}">
                    {{$x->name}}
                </option>
                @endforeach
            </select>
            <br><br>
            <select class="custom-select mr-sm-2" id="depart" name="depart">
                @foreach ($rowd as $y)
                <option value="{{$y->id}}">
                    {{$y->name}}
                </option>
                @endforeach
            </select><br>
            <hr>
            <input class="btn btn-danger" type="submit" value="إضافه">
            <a href="../Subjectsa" style="float:right">
                <input class="btn btn-block" type="Button" value="إلغاء">
            </a>
        </form>
@stop
