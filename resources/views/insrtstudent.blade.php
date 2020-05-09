
@extends('master')

@section('content')
    <form  action="storestudent" method="post" style="margin:auto;margin-bottom:1vh">
        <br>
        <h1>
            Insert Student
        </h1>
        {{csrf_field()}}
        <br>
        Name<br>
        <input class="form-control" type="text" name="name" placeholder="Name ..."><br>
        National ID<br>
        <input class="form-control" type="text" name="naid" placeholder="National ID ..."><br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="level">Level</label>
            </div>
            <select class="custom-select dynamic" id="level" name="level" data-dependent="depart">
                <option selected>Choose...</option>
                @foreach($rowl as $l)
                    <option value="{{$l->id}}">
                {{$l->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="result">Department</label>
            </div>
            <select class="custom-select" id="depart" name="depart">
                <option selected>Choose...</option>
            </select>
        </div>
        <input class="btn btn-danger" type="submit" value="Insert">
        <a href="A-Page" style="float:right">
            <button class="btn btn-block" type="button">
                Cancel
            </button>
        </a>

    </form>

<div>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>National ID</th>
        <th>Level</th>
        <th>Department</th>
        </thead>
        <tbody>
            @foreach($rows as $s)

            <tr>
                <th scope="row">
                    {{$s->id}}
                </th>
                <td>{{$s->name}}</td>
                <td>{{$s->Nationalid}}</td>
                @foreach($rowd as $d)
                    @foreach ($rowl as $l)
                        @if($s->department_id == $d->id)
                            @if($d->level_id == $l->id)
                                <td>{{$l->name}}</td>
                                <td>{{$d->name}}</td>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <td>
                    <a href="{{$s->id}}/Deleting">
                        <i class="fas fa-times" style="color: red"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <script>
        $(document).ready(function(){
            $('#level').change(function(){
                var s = $(this).val();
                $.ajax({
                    url:'ajax1',
                    method:'GET',
                    data:{z:s},
                    dataType:'text',
                    success:function(data){
                        $('#depart').html(data);
                    }

                });

            });

        });
    </script>
@stop
