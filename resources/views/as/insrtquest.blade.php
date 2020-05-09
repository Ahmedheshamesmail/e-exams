@extends('as.master3')
@section('content')
    <form style="margin-top: 10vh;font-size: 17px" action="insert-mcqa" method="post" style="margin: auto">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="direction: rtl">أكتب السؤال هنا ..</label>
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
                    <option selected>أختر ...</option>
                    @foreach($rowdi as $y)
                        <option value="{{$y->id}}">
                            {{$y->name}}
                        </option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">الاجابه الاولي</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="الاجابه الاولي" name="first">
                @error('first')
                <div style="color: red;font-size: 13px">يرجي كتابة نص الاجابه</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="one" id="exampleRadios1" value="1">
                    <label class="form-check-label text-success" for="exampleRadios1">
                        اجابه صحيحه
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="one" id="exampleRadios2" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios2">
                        اجابه خاطئه
                    </label>
                    @error('one')
                    <div style="color: red;font-size: 13px">يجب اختيار مدى صحة الاجابه</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">الاجابه الثانيه</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="الاجابه الثانيه" name="second">
                @error('second')
                <div style="color: red;font-size: 13px">يرجي كتابة نص الاجابه</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="two" id="exampleRadios12" value="1">
                    <label class="form-check-label text-success" for="exampleRadios12">
                       اجابه صحيحه
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="two" id="exampleRadios22" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios22">
                       اجابه خاطئه
                    </label>
                    @error('two')
                    <div style="color: red;font-size: 13px">يجب اختيار مدى صحة الاجابه</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">الاجابه الثالثه</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="الاجابه الثالته" name="third">
                @error('third')
                <div style="color: red;font-size: 13px">يرجي كتابة نص الاجابه</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="three" id="exampleRadios13" value="1">
                    <label class="form-check-label text-success" for="exampleRadios13">
                        اجابه صحيحه
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="three" id="exampleRadios23" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios23">
                        اجابه خاطئه
                    </label>
                    @error('three')
                    <div style="color: red;font-size: 13px">يجب اختيار مدى صحة الاجابه</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">الاجابه الرابعه</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="الاجابه الرابعه" name="fourth">
                @error('fourth')
                <div style="color: red;font-size: 13px">يرجي كتابة نص الاجابه</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="four" id="exampleRadios14" value="1">
                    <label class="form-check-label text-success" for="exampleRadios14">
                        اجابه صحيحه
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="four" id="exampleRadios24" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios24">
                        اجابه خاطئه
                    </label>
                    @error('four')
                    <div style="color: red;font-size: 13px">يجب اختيار مدى صحة الاجابه</div>
                    @enderror
                </div>
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
