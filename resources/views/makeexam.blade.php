@extends('master4')
@section('contain')
<form action="setstructure" method="post" style="padding-top: 7vh;font-size: 20px;border-right: 1px solid green;padding-right: 20px;margin-top: 20px">
    {{csrf_field()}}
    <div class="form-group row">
        <label for="select1" class="col-sm-4 col-form-label">Select Chapter</label>
        <div class="col-sm-8">
            <select name="chapter" id="select1" class="form-control">
                @foreach($rowch as $q)
                    <option value="{{$q->id}}">
                        {{$q->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="ch" class="col-sm-4 col-form-label">Number of Questions of this Chapter</label>
        <div class="col-sm-8">
            <input class="form-control" type="number" id="ch" name="quest">
        </div>
    </div>
    <div class="form-group row">
        <label for="select2" class="col-sm-4 col-form-label">Select Degree of Difficulty</label>
        <div class="col-sm-8">
            <select name="degree" id="select2" class="form-control">
                @foreach($rowdif as $dif)
                    <option value="{{$dif->id}}">
                        {{$dif->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <input type="submit" class="btn btn-success">
    <a href="../{{$lid}}/ExamStructure">
        <button class="btn btn-block" type="button">
            Cancel
        </button>
    </a>
</form><br><br><hr>

<div class="col-md-5 col-12">
    <h3 style="padding: 30px 0px;border-bottom: 1px solid black;border-top: 1px solid black;margin-top: 2vh">Structures You Added</h3>
    <hr>
    <table class="table table-dark col-12">
        <thead>
            <th>Chapter</th>
            <th>Number</th>
            <th>Difficulty</th>
        </thead>
        <tbody>
            @foreach($rowstructure as $str)
                @foreach($rowch as $c)
                    @if($str->chapter_id == $c->id)
                        @foreach($rowdif as $f)
                            @if($str->difficult_id == $f->id)
                            <tr>
                                <td>{{$c->name}}</td>
                                <td>{{$str->numofq}}</td>
                                <td>{{$f->name}}</td>
                                <td>
                                    <a href="../../{{$str->id}}/deletestr">
                                        <i class="fas fa-times hover2" style="color: red;font-size: 20px"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
        <td>
            Summation :
        </td>
        <td>
            {{$sum}}
        </td>
        </tfoot>
    </table>
</div>

@stop