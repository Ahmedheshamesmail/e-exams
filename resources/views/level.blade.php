@extends('master')

@section('content')
<h1 style="padding:30px;">
        Levels
    </h1>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Level</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rowl as $x)
            <tr>
                <th scope="row">{{$x->id}}</th>
                <td>{{$x->name}}</td>
                <td>
                    <a href="{{$x->id}}/deletel">
                        <button class="btn btn-outline-danger">
                            <i class="fas fa-times"></i> Delete
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="level">
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i> New level
        </button>
    </a>
@stop
