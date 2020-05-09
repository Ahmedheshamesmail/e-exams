@extends('master4')
@section('contain')
    <h1 style="margin-top: 13vh;padding: 20px">
        Questions
    </h1>
    <br>
    <br>
    <br>
    <div class="card-header" id="headingOne" style="margin-top: 13vh;">
        <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Insert Questions
            </button>
        </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <a href="../Insert-Questions-TF" style="margin-top: 13vh;float:right;margin-bottom: 3vh">
                <button class="btn btn-primary">
                    True & False
                </button>
            </a>
        </div>
        <div class="card-body">
            <a href="../Insert-Questions-MCQ" style="margin-top: 13vh;float:right;margin-bottom: 3vh">
                <button class="btn btn-primary">
                    MCQ
                </button>
            </a>
        </div>
        <div class="card-body">
            <a href="../Insert-Questions-Open" style="margin-top: 13vh;float:right;margin-bottom: 3vh">
                <button class="btn btn-primary">
                    Open Question
                </button>
            </a>
        </div>
    </div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Question</th>
        <th scope="col">Degree of Difficulty</th>
        <th scope="col">Answers</th>

    </tr>
    </thead>
            <tbody>
        @foreach($rowq as $x)
            @if($x->chapter_id == $cid)
                <tr>
                    <th scope="row">{{$x->id}}</th>
                    <td>{{$x->text}}</td>
                    <td>
                        @foreach($dd as $do)
                            @if($x->difficult_id == $do->id)
                                {{$do->name}}
                            @endif
                            @endforeach
                    </td>
                    <td>
                        <div  id="headingOne{{$x->id}}">
                            <h5 class="mb-0">
                                <button class="btn" data-toggle="collapse" data-target="#collapsetwo{{$x->id}}" aria-expanded="true" aria-controls="collapsetwo{{$x->id}}">
                                    <i class="fas fa-tasks"></i>
                                </button>
                            </h5>
                        </div>

                        <div id="collapsetwo{{$x->id}}" class="collapse show" aria-labelledby="headingOne{{$x->id}}" data-parent="#accordion">

                            <div class="card-body" >
                                @foreach($rowans as $ans)
                                    @if($ans->question_id == $x->id)
                                    <button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal22{{$ans->id}}">
                                        {{$ans->text}}
                                    </button>
                                        <div class="modal fade" id="exampleModal22{{$ans->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <form class="modal-content" action="update-answer" method="post">
                                                    {{csrf_field()}}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Answers</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden"  name="answer" value="{{$ans->id}}"><br>
                                                        <div class="col-md-5 mb-3">
                                                            <label for="validationServer01">Edit Answer</label><br>
                                                            <input type="text" class="form-control" id="validationServer01" placeholder="Answer.." value="{{$ans->text}}" name="first"><br>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="one" id="exampleRadios1{{$ans->id}}" value="1">
                                                                <label class="text-success" for="exampleRadios1{{$ans->id}}">
                                                                    Correct
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="one" id="exampleRadios2{{$ans->id}}" value="0">
                                                                <label class="text-danger" for="exampleRadios2{{$ans->id}}"> Wrong</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <div  id="headingOne11222{{$x->id}}">
                            <p class="sit sitting" style="color: #666666" data-toggle="collapse" data-target="#collapsetwo11222{{$x->id}}" aria-expanded="true" aria-controls="collapsetwo11222{{$x->id}}">
                                <i class="fas fa-cog" style="font-size: 25px;cursor:pointer;"></i>
                            </p>
                        </div>
                        <div id="collapsetwo11222{{$x->id}}" class="collapse show" aria-labelledby="headingOne11222{{$x->id}}" data-parent="#accordion">
                            <div class="card-body" >
                                <p class="sit" style="color: #00cccc;font-size: 18px" data-toggle="modal" data-target="#exampleModalCenteredit{{$x->id}}">
                                    <i class="fas fa-edit" style="font-size: 20px;margin-right: 5px;cursor:pointer;"></i><hr>
                                </p>
                                <div class="modal fade" id="exampleModalCenteredit{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form class="modal-content" action="uptext" method="post">
                                            {{csrf_field()}}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Question</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control" name="text" placeholder="Question ...">
                                                <input type="hidden"  name="question" value="{{$x->id}}"><br>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect02">Difficulty Degree</label>
                                                    </div>
                                                    <select class="custom-select" id="inputGroupSelect02" name="difficult">
                                                        <option selected>Choose...</option>
                                                        @foreach($dd as $y)
                                                            <option value="{{$y->id}}">
                                                                {{$y->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div  id="headingOne11{{$x->id}}">
                                    <p class="sit" style="color: #0099ff;font-size: 18px" data-toggle="collapse" data-target="#collapsetwo11{{$x->id}}" aria-expanded="true" aria-controls="collapsetwo11{{$x->id}}">
                                        <i class="fas fa-paperclip" style="font-size: 20px;margin-right: 5px;cursor:pointer;"></i>
                                    </p>
                                </div>
                                <div id="collapsetwo11{{$x->id}}" class="collapse show" aria-labelledby="headingOne11{{$x->id}}" data-parent="#accordion">
                                    <div class="card-body" >
                                        <p>
                                            <button class="btn btn-outline-dark" style="margin-right: 10px;"  data-toggle="modal" data-target="#exampleModalCenter1{{$x->id}}">
                                               <i class="fas fa-image" style="color: chartreuse"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter1{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form class="modal-content" action="imageadd" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Image</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="file" class="form-control" name="file" placeholder="Brawse ..">
                                                            <input type="hidden"  name="question" value="{{$x->id}}"><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                        <p  style="margin-right: 10px;color: black">
                                            <button class="btn btn-outline-dark"  data-toggle="modal" data-target="#exampleModalCenter3{{$x->id}}">
                                               <i class="fas fa-music"  style="color: blueviolet"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter3{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form class="modal-content" action="audioadd" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Audio</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="file" class="form-control" name="file" placeholder="Brawse ..">
                                                            <input type="hidden"  name="question" value="{{$x->id}}"><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                        <p style="color: black">
                                            <button class="btn btn-outline-dark"  data-toggle="modal" data-target="#exampleModalCenter2{{$x->id}}">
                                                <i class="fas fa-video"  style="color: blue"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter2{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form class="modal-content" action="videoadd" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Video</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="file" class="form-control" name="file" placeholder="Brawse ..">
                                                            <input type="hidden"  name="question" value="{{$x->id}}"><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <a href="../{{$x->id}}/deletequest" style="color: red;">
                                    <i class="fas fa-trash-alt" style="font-size: 20px;"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endif
            @endforeach
    </tbody>
</table>
    @stop
