@extends('master4')
@section('contain')
    <h1 style="margin-top: 13vh">
        Subjects Time
    </h1>
    <br>
    <br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Department</th>
            <th scope="col">Level</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rowd as $d)

        @foreach($rows as $x)
            @if($d->level_id == $lid)
                @if($x->department_id == $d->id)
                <tr>
                    <th scope="row">{{$x->id}}</th>
                    <td>{{$x->name}}</td>

                    <td>
                            @if($x->department_id == $d->id)
                                {{$d->name}}
                            @endif
                    </td>
                    <td>
                        {{$d->level_id}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$x->id}}">
                        <i class="fas fa-stopwatch"></i>
                        </button>
                        <div class="modal fade" id="exampleModalCenter{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form class="modal-content" action="sTime" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Time</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="hour">Duration of Exam :</label>
                                        <input id="hour" type="number" class="form-control" name="hour" placeholder="Hour ..">
                                        <label for="min">Duration of Exam :(Additional Minutes)</label>
                                        <input id="min" type="number" class="form-control" name="min" placeholder="Minute ..">
                                        <label for="date">Date of Start Exam :</label>
                                        <input id="date" type="date" class="form-control" name="date">
                                        <label for="time">Starting Time :</label>
                                        <input id="time" type="time" class="form-control" name="time">
                                        <input type="hidden"  name="subject" value="{{$x->id}}"><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Set Time</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>

                </tr>
             @endif
                @endif
        @endforeach
        @endforeach
        </tbody>
    </table>
@stop
