@extends('master4')
@section('contain')
    <div style="width: 100%">
        <div class="container">
            <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 15vh">

                <h1 style="margin: 3vh 0px;">
                    @foreach($rowl2 as $l)
                        {{$l->name}} /
                    @endforeach
                    @foreach($rowd as $d)
                        {{$d->name}}
                    @endforeach
                    / Subjects 

                </h1>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $s)
                        <tr>
                            <th scope="row">{{$s->id}}</th>
                            <td>{{$s->name}}</td>
                            <td>
                                <a href="../{{$s->id}}/Update-Subject">
                                    <button class="btn btn-link">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="../{{$s->id}}/deletemysub">
                                    <button class="btn btn-outline-danger">
                                        <i class="fas fa-times"></i> Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
@stop

