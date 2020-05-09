@extends('master')
@section('content')


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Subject</th>
            <th scope="col">Department</th>
            <th scope="col">Level</th>
            <th scope="col">Professor</th>
        </tr>
        </thead>
        <tbody class="col-8">
        @foreach($rows as $x)
                <tr>
                    <td>{{$x->name}}</td>
                    @foreach($rowd as $d)
                        @if($d->id == $x->department_id)
                            <td>{{$d->name}}</td>

                        @foreach($rowl as $l)
                            @if($l->id == $d->level_id)
                                <td>{{$l->name}}</td>
                            @endif
                        @endforeach
                        @endif
                    @endforeach

                    @foreach($rowp as $p)
                        @if($p->id == $x->professor_id)
                    <td>{{$p->name}}</td>
                    @endif
                    @endforeach
                    <td class="card">

                                <i class="fas fa-cog af-control text-black" class="card-header" id="headingOnecog{{$x->id}}" data-toggle="collapse" data-target="#collapseOnecog{{$x->id}}" aria-expanded="true" aria-controls="collapseOnecog{{$x->id}}"></i>


                        <!--
                          <p style="padding: 10px 20px;background-color: grey;color: white;border-radius: 20px">working  <i class="fas fa-clock"></i> </p>
                        -->
                        <div id="collapseOnecog{{$x->id}}" class="collapse show" aria-labelledby="headingOnecog{{$x->id}}">
                            <div class="card-body colicon">
                                <a href="{{$x->id}}/subid">
                                    <i class="fas fa-plus-square text-warning" ></i>
                                </a>

                        <a href="{{$x->id}}/subid2" >
                            <i class="fas fa-stop-circle text-danger" ></i>
                        </a>

                        <i class="fa fa-hourglass-start text-success " style="cursor:pointer" aria-hidden="true" data-toggle="modal" data-target="#exampleModalCenter{{$x->id}}"></i>
                        <div class="modal fade" id="exampleModalCenter{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle{{$x->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form class="modal-content" action="sTime2" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle{{$x->id}}">Time</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="hour">Duration of Exam :</label>
                                        <input id="hour" type="number" class="form-control" name="hour" placeholder="Hours ..">
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
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
