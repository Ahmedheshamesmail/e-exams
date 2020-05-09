@extends('as.master2')

@section('contain')
<form  action="updateda" method="post" style="margin:auto">
            <br><br>
            <h1>
               تعديل القسم
            </h1>
           {{csrf_field()}}
           <br>
            <br>
           <label for="name" style="font-size:20px;">الاسم</label>
           <br>
           <input class="form-control" type="text" name="name" id="name"  value="{{$rowd->name}}">
           <input type="hidden" name="did" value="{{$rowd->id}}">
                    <br>
                    <select class="custom-select mr-sm-2" name="level">
                        @foreach ($rowl as $x)
                        <option value="{{$x->id}}">
                            {{$x->name}}
                        </option>
                        @endforeach
                    </select>
                    <br><br>
                    <br><hr>
                    <input class="btn btn-danger" type="submit" value="تعديل">
                    <a href="../Departmentsa" style="float:right">
                        <input class="btn btn-block" type="button" value="إلغاء">
                    </a>
        </form>
@stop
