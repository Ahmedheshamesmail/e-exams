@extends('master')
@section('content')
<h1 style="padding:30px;">
        Professors
        <br>
    </h1>
    <br>
    <br>
    <br>
    <hr>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Professor</th>
            <th scope="col">Phone Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rowp as $x)
            <tr>
                <th scope="row">{{$x->id}}</th>
                <td>{{$x->name}}</td>
                <td>{{$x->phone}}</td>
                <td>
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$x->id}}" aria-expanded="true" aria-controls="collapseOne{{$x->id}}">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne{{$x->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body d-flex justify-content-between align-content-center align-items-center flex-wrap">
                            <a href="{{$x->id}}/makea" class="text-primary col-3">
                                <i class="fas fa-user-graduate" style="color: #999900;"></i>
                            </a>
                            <span  class="text-primary col-3" data-toggle="modal" data-target="#exampleModal22{{$x->id}}">
                                <i class="fas fa-plus text-success" style="cursor:pointer"></i>
                            </span>
                            <div class="modal fade" id="exampleModal22{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form class="modal-content" action="sub2" method="post">
                                        {{csrf_field()}}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Subject</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden"  name="prof" value="{{$x->id}}"><br>
                                            <div class="col-md-5 mb-3">
                                                <label for="validationServer01">Subject</label><br>
                                                <input type="text" class="form-control" id="validationServer01" placeholder="Subject .." name="subject"><br>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Department</span>
                                                </div>
                                                <select class="form-control" id="basic-url" name="department" aria-describedby="basic-addon3">
                                                    @foreach($rowd as $d)
                                                        <option value="{{$d->id}}">
                                                            {{$d->name}}
                                                        </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a href="../{{$x->id}}/deleteprof" class="col-3">
                                   <i class="fas fa-trash text-danger"></i>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
