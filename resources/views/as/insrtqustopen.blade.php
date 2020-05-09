@extends('as.master3')
@section('content')
    <form style="margin-top: 13vh;font-size: 17px" action="insert-opena" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">اكتب السؤال هنا ..</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="50" name="text"></textarea>
            </div>
            @error('text')
            <div style="color: red;font-size: 13px">يرجي كتابة نص السؤال</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect02">درجة الصعوبه</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="difficult">
                    <option selected>أختر ..</option>
                    @foreach($rowdi as $y)
                        <option value="{{$y->id}}">
                            {{$y->name}}
                        </option>
                        @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">حفظ</button>
        <a href="{{$chid}}/Questionsa">
            <button class="btn btn-secondary" type="button">
                إلغاء
            </button>
        </a>
    </form>
@stop
