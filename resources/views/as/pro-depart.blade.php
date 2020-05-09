@extends('as.master4')
@section('contain')
    <div style="width: 100%">
        <div class="container">
            <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 15vh">

                <h1 style="margin: 3vh 0px;">
                    @foreach($rowl2 as $l){{$l->name}}@endforeach
                </h1>

                <div style="width: 100%">
                    <div class="container">
                        <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 15vh">
                            @foreach($rowd as $u)
                                <a class="app-section col-6" href="../{{$u->id}}/My-Subjectsa" style="color: black;text-decoration: none">
                                   <div class="alert alert-success"> {{$u->name}}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

