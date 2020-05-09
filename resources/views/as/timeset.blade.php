@extends('as.master4')
@section('contain')
    <h1 style="margin-top: 13vh">
        زمن الامتحان
    </h1>
    <br>
    <br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">الماده</th>
            <th scope="col">القسم</th>
            <th scope="col">الصف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rowd as $d)

        @foreach($rows as $x)
            @if($d->level_id == $lid)
                @if($x->department_id == $d->id)
                <tr>
                    <th scope="row">{{$x->id}}</th>
                    <td>{{$x->name}}</td>

                    <td>
                            @if($x->department_id == $d->id)
                                {{$d->name}}
                            @endif
                    </td>
                    <td>
                        {{$d->level_id}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$x->id}}">
                        <i class="fas fa-stopwatch"></i>
                        </button>
                        <div class="modal fade" id="exampleModalCenter{{$x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form class="modal-content" action="sTime" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"> تعديل الوقت</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="hour">مدة الامتحان :</label>
                                        <input id="hour" type="number" class="form-control" name="hour" placeholder="ساعه ..">
                                        <label for="min">مدة الامتحان :(الدقائق الاضافيه)</label>
                                        <input id="min" type="number" class="form-control" name="min" placeholder="دقيقه ..">
                                        <label for="date">تاريخ الامتحان :</label>
                                        <input id="date" type="date" class="form-control" name="date">
                                        <label for="time">ساعة البدء :</label>
                                        <input id="time" type="time" class="form-control" name="time">
                                        <input type="hidden"  name="subject" value="{{$x->id}}"><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">اضف الزمن</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>

                </tr>
             @endif
                @endif
        @endforeach
        @endforeach
        </tbody>
    </table>
@stop
