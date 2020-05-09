@extends('as.master2')

@section('contain')
<form  action="updatesa" method="post" style="margin:auto">
            <br><br>
            <h1 class="hh">
                
                تعديل الماده
            </h1>
           {{csrf_field()}}
           
            <br>
           <label for="name" style="font-size:20px;">الاسم</label>
           <br>
           <input class="form-control" type="text" name="name" id="name" placeholder="الماده" value="{{$rows->name}}">
           <input type="hidden" name="sid" value="{{$rows->id}}">
           <br>
           <select class="custom-select mr-sm-2" id="prof" name="prof">
                @foreach ($rowp as $x)
                <option value="{{$x->id}}">
                    {{$x->name}}
                </option>
                @endforeach
            </select>
                    <select class="custom-select mr-sm-2" name="depart">
                        @foreach ($rowd as $x)
                        <option value="{{$x->id}}">
                            {{$x->name}}
                        </option>
                        @endforeach
                    </select>
                    <br><br>
                    <br><hr>
                    <input class="btn btn-danger" type="submit" value="تعديل" style="">
                    <a href="../Subjectsa" style="float:right">
                        <input class="btn btn-bd-primary" type="button" value="إلغاء" style="">
                    </a>
        </form>
@stop
