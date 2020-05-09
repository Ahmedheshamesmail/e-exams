@extends('as.master')

@section('content')
        <form  action="depa" method="post"  style="margin:auto">
            <br><br>
            <h1>
                إضافة قسم
            </h1>
           {{csrf_field()}}
           <br>
            <br>
           <label for="name" style="font-size:20px;">الاسم</label>
           <br>
                    <input class="form-control" type="text" name="name" id="name" placeholder="اسم القسم">

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
                    <input class="btn btn-danger" type="submit" value="إضافه">
            <a href="Departmentsa" style="float:right">
                <input class="btn btn-block" type="button" value="إلغاء">
            </a>
        </form>
@stop
