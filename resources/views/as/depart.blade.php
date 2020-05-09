@extends('as.master')
@section('content')
<h1 style="padding:30px;">
    الاقسام
</h1>
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">القسم</th>
                <th scope="col">المستوي</th>
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
                    <a href="{{$x->id}}/updatedepartmenta">
                            <i class="fas fa-edit text-primary"></i>
                    </a>
                </td>
                <td>
                    <a href="{{$x->id}}/deletedepartmenta">
                            <i class="fas fa-trash-alt text-danger"></i>
                    </a>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <a href="departmenta">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i> اضافة قسم
            </button>
         </a>
@stop
