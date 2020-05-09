@extends('as.master3')
@section('content')
<p height="100" style="background:#56A960;color:white;padding:10px;border-top-left-radius:20px;margin-top: 2vh;">
    <i>
    ربما يؤدي عدم تحديد عدد الاسئله الي مشاكل في هيكل الامتحان

    </i>
</p>
    <div class="" style="width:400px;height:65vh;border-radius:20px;background:#D1E6C5;padding:15px;margin-top:5vh">
        <h5>ضع عدد الاسئله في كلا من الامتحان النهائي والتجريبي</h5>
        <hr>
        <form action="addnumqa" method="post">
            {{csrf_field()}}
            <label class="form-label" for="final">الامتحان النهائي</label><br>
            <input class="form-control" type="number" id="final" name="final" placeholder="الامتحان النهائي"><br>
            <label class="form-label" for="finalch">الامتحان النهائي <i>(عدد اسئلة كل فصل)</i></label><br>
            <input class="form-control" type="number" id="finalch" name="finalch" placeholder="عدد اسئلة الفصل .."><br>
            <label class="form-label" for="train">الامتحان التجريبي <i>(عدد اسئلة كل فصل)</i></label><br>
            <input class="form-control" type="number" id="train" name="train" placeholder="الامتحان التجريبي"><br><hr>
            <input type="submit" class="btn" value="حفظ" style="background:#AD3DC2;color:white">
        </form>
    </div>
@stop
