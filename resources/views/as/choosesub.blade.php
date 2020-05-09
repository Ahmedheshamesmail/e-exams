@extends('as.master4')
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
                        <th scope="col">المواد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $s)
                        <tr>
                            <th scope="row">{{$s->id}}</th>
                            <td>{{$s->name}}</td>
                            <td>
                                <a href="../{{$s->id}}/Choosed-Subjecta" class="text-primary">
                                    حساب الاجوبه
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

