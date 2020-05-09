@extends('as.master')

@section('content')
<h1 style="padding:30px;">
       الصف
    </h1>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">الصف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rowl as $x)
            <tr>
                <th scope="row">{{$x->id}}</th>
                <td>{{$x->name}}</td>
                <td>
                    <a href="{{$x->id}}/deletela">
                        <button class="btn btn-outline-danger">
                            <i class="fas fa-times"></i> حذف
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="levela">
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة صف
        </button>
    </a>
@stop
