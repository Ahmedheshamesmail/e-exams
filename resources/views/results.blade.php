@extends('master3')

@section('content')
    <div style="width: 100%">

        <div class="container">
            <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 12vh">
                <div class="app-section col-12" style="color: black;text-decoration: none">
                    <table class="table table-striped">
                        <thead>
                            <th>Subject</th>
                            <th>Student</th>
                            <th>Result</th>
                            <th>Level</th>
                            <th>Department</th>
                        </thead>
                        <tbody>
                        @foreach($rows as $s)
                            @if($s->professor_id == $y)
                                @foreach($rowr as $r)
                                    @if($r->subject_id == $s->id)
                                        @foreach($rowstu as $st)
                                            @if($st->id == $r->student_id)
                                                @foreach($rowd as $d)
                                                    @if($d->id == $s->department_id)
                                                        @foreach($rowl as $l)
                                                            @if($d->level_id == $l->id)
                                                                <tr>
                                                                    <td>{{$s->name}}</td>
                                                                    <td>{{$st->name}}</td>
                                                                    <td>{{$r->result}}</td>
                                                                    <td>{{$l->name}}</td>
                                                                    <td>{{$d->name}}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                 @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <i class="fas fa-download" onclick="window.print()" style="float: left;cursor: pointer;color: #823fff;font-size: 25px;margin-top: 2.5vh;margin-left: 5%;"></i>
    </div>
@stop
