@extends('master4')
@section('contain')
<div style="width: 100%">
    <div class="container">
        <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 15vh;font-size: 20px">
            @foreach($rowd as $u)
                    @if($u->level_id == $lid)
                        <div  id="headingOne{{$u->id}}" class=" col-6">
                                <div class="alert alert-success" data-toggle="collapse" data-target="#collapsetwo{{$u->id}}" aria-expanded="true" aria-controls="collapsetwo{{$u->id}}">
                                    {{$u->name}}
                                </div>
                        </div>
                        <div id="collapsetwo{{$u->id}}" class="collapse show" aria-labelledby="headingOne{{$u->id}}" data-parent="#accordion">
                            <div class="card-body" >
                            @foreach($rows as $s)
                                @if($s->department_id == $u->id)
                                    <a href="../{{$s->id}}/Make-Structure" class="btn-outline-success text-primary col-12 justify-content-center"><center> {{$s->name}}</center></a>
                                @endif
                             @endforeach
                            </div>
                        </div>
                        @endif
            @endforeach
        </div>
    </div>
</div>
@stop


