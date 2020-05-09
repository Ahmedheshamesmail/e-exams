@extends('as.master')

@section('content')
    <form  action="leva" method="post" style="margin:auto">
        <br><br>
        <h1>
            إضافه صف
        </h1>
        {{csrf_field()}}
        <br>
        <br>
        <label for="name" style="font-size:20px;">الاسم</label>
        <br>
        <input class="form-control" type="text" name="name" id="name" placeholder="الاسم">
        <br>
        <br><hr>
        <input class="btn btn-danger" type="submit" value="إضافه">
        <a href="Levelsa"  style="float:right">
            <button type="button" class="btn" >إلغاء</button>
        </a>
    </form>
@stop
