@extends('as.master')

@section('content')
<h1 style="padding:30px;">
    المواد
</h1>
        <table class="table table-striped table-hover col-12">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">الماده</th>
                <th scope="col">المدرس</th>
                <th scope="col">القسم</th>
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
                    <a href="{{$x->id}}/updatesubjecta">
                            <i class="fas fa-edit text-success"></i> 
                    </a>
                </td>
                <td>
                    <a href="{{$x->id}}/deletesubjecta">
                       
                            <i class="fas fa-trash-alt text-danger"></i>
                    </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        <a href="subjecta">
            <button class="btn btn-primary">
               <i class="fas fa-plus"></i> إضافة ماده
            </button>
        </a>

@stop
