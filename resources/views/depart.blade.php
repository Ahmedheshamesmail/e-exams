@extends('master')
@section('content')
<h1 style="padding:30px;">
    Departments
</h1>
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Department</th>
                <th scope="col">Level</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rowd as $x)
              <tr>
                <th scope="row">{{$x->id}}</th>
                <td>{{$x->name}}</td>
                <td>
              @foreach($rowl as $y)
                @if ($y -> id == $x->level_id)
                    {{$y ->name}}
                @endif
              @endforeach
                </td>
                <td>
                    <a href="{{$x->id}}/updatedepartment">
                            <i class="fas fa-edit text-primary"></i>
                    </a>
                </td>
                <td>
                    <a href="{{$x->id}}/deletedepartment">
                            <i class="fas fa-trash-alt text-danger"></i>
                    </a>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <a href="department">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i> New Departments
            </button>
         </a>
@stop
