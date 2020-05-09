@extends('master4')
@section('contain')
    <div style="width: 100%">
        <div class="container">
            <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 15vh">

                <h3 style="margin: 3vh 0px;">
                    Subjects / @foreach($rows as $l){{$l->name}}@endforeach
                </h3>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Chapter</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rowc as $x)
                        <tr>
                            <th scope="row">{{$x->id}}</th>
                            <td>{{$x->name}}</td>
                            <td>
                            <div class="card" style="background:rgba(0,0,0,.01);border: 0;">
                                <div id="headingOne">
                                            <i class="fas fa-edit text-success"  data-toggle="collapse" data-target="#collapseOne{{$x->id}}" aria-expanded="true" aria-controls="collapseOne{{$x->id}}"></i>
                                </div>
                                <div id="collapseOne{{$x->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter1{{$x->id}}">
                                            <i class="fas fa-pen-fancy"></i> Change Chapter Name
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter1{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <form class="modal-content" action="updatechap" method="post">
                                                    {{csrf_field()}}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Enter New Name</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($rows as $l)
                                                            <input type="hidden" value="{{$l->id}}" name="subject">
                                                        @endforeach
                                                        <input type="text" class="form-control" name="name" placeholder="Chapter Name ..">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="../{{$x->id}}/Questions">
                                            <button class="btn btn-success">
                                                <i class="fas fa-folder-open"></i> View Questions
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td>
                                <a href="../{{$x->id}}/Delete-Ch">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fas fa-plus"></i> New Chapter
                </button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form class="modal-content" action="ins-ch" method="post">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Chapter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @foreach($rows as $l)
                                    <input type="hidden" value="{{$l->id}}" name="subject">
                                    @endforeach
                                <input type="text" class="form-control" name="name" placeholder="Chapter Name ..">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
             <!--   <a href="../New-Chapter">
                    <button class="btn btn-primary">
                        Insert New Chapter
                    </button>

                </a>
                -->
            </div>
        </div>
    </div>
@stop
<!-- Button trigger modal -->

<!-- Modal -->


