
@extends('master3')
@section('content')
<p height="100" style="background:#56A960;color:white;padding:10px;border-top-left-radius:20px;margin-top: 1vh;">
    <i>If The Number of Questions of Both Final & Train Exams Not Be Set,<br>
    We will have Problems in Setting Exam Structure </i>
</p>
    <div class="" style="width:400px;height:65vh;border-radius:20px;background:#D1E6C5;padding:15px;margin-top:5vh">
        <h5>Set Number of Question of Final & Training Exams</h5>
        <hr>
        <form action="addnumq" method="post">
            {{csrf_field()}}
            <label class="form-label" for="final">Final Exam</label><br>
            <input class="form-control" type="number" id="final" name="final" placeholder="Final Exam ..."><br>
            <label class="form-label" for="finalch">Final Exams <i>(Number of Questions of each Chapter)</i></label><br>
            <input class="form-control" type="number" id="finalch" name="finalch" placeholder="Final Exam chapters ..."><br>
            <label class="form-label" for="train">Train Exams <i>(Number of Questions of each Chapter)</i></label><br>
            <input class="form-control" type="number" id="train" name="train" placeholder="Train Exams ..."><br><hr>
            <input type="submit" class="btn" value="Save" style="background:#AD3DC2;color:white">
        </form>
    </div>
@stop
