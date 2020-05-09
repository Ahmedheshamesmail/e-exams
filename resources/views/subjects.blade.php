@extends('master')

@section('content')
<h1 style="padding:30px;">
    Subjects
</h1>
        <table class="table table-striped table-hover col-12">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Professor</th>
                <th scope="col">Department</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rows as $x)
              <tr>
                <th scope="row">{{$x->id}}</th>
                <td>{{$x->name}}</td>
                <td>
              @foreach($rowp as $y)
                @if ($y -> id == $x->professor_id)
                    {{$y ->name}}
                @endif
              @endforeach
                </td>
                <td>
              @foreach($rowd as $z)
                @if ($z -> id == $x->department_id)
                    {{$z ->name}}
                @endif
              @endforeach
                </td>
                <td>
                    <a href="{{$x->id}}/updatesubject">
                            <i class="fas fa-edit text-success"></i> 
                    </a>
                </td>
                <td>
                    <a href="{{$x->id}}/deletesubject">
                       
                            <i class="fas fa-trash-alt text-danger"></i>
                    </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        <a href="subject">
            <button class="btn btn-primary">
               <i class="fas fa-plus"></i> New subject
            </button>
        </a>

@stop
