@extends('as.master4')

@section('contain')
    <div style="width: 100%">
        <div class="container">
            <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 10vh">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">السؤال</th>
                            <th scope="col">الاجابات</th>
                            <th scope="col">الاجابات الصحيحه<i class="fas fa-check text-success " style="margin-left: 10px;"></i></th>
                            <th scope="col">الاجابات الخاطئه<i class="fas fa-times text-danger " style="margin-left: 10px;"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rowch as $ch)

                        @foreach($rowq as $q)
                            @if($q->chapter_id == $ch->id)
                            @foreach($rowansed as $qs)
                                @if($q->id == $qs->question_id)
                            <tr>
                                <th scope="row">
                                    {{$q->id}}
                                </th>
                                <td>
                                    {{$q->text}}
                                </td>
                                <td>
                                    <div class="card-header" id="headingOne{{$q->id}}">
                                        <button class="btn" data-toggle="collapse" data-target="#collapseOne{{$q->id}}" aria-expanded="true" aria-controls="collapseOne{{$q->id}}">
                                            <i class="fas fa-eye text-warning" style="font-size: 30px"></i>
                                        </button>
                                    </div>
                                    <div id="collapseOne{{$q->id}}" class="collapse show" aria-labelledby="headingOne{{$q->id}}" data-parent="#accordion">
                                        <div class="card-body">

                                                    @foreach($rowans as $as)
                                                        @if($as->question_id == $q->id)
                                                        <a href="../{{$as->id}}/calcuansa">
                                                            <button class="btn btn-info">
                                                                {{$as->text}}
                                                            </button>
                                                        </a>
                                                        @endif
                                                    @endforeach
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <a href="../{{$q->id}}/calcua" class="text-success justify-content-center d-flex">
                                        <i class="fas fa-calculator"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="../{{$q->id}}/calcuwa" class="text-info justify-content-center d-flex">
                                    <i class="fas fa-calculator"></i>
                                    </a>
                                </td>
                            </tr>
                                @endif
                            @endforeach
                            @endif
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@stop

