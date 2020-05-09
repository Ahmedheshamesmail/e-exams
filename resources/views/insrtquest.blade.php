@extends('master3')
@section('content')
    <form style="margin-top: 13vh;font-size: 17px" action="insert-mcq" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type Question here ..</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" cols="50" rows="3" name="text"  value="{{old('text')}}"></textarea>
            </div>
<br>
            @error('text')
            <div style="color: red;font-size: 13px">Please Enter your Question</div>
            @enderror

            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect02">Difficulty Degree</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="difficult" >
                    @foreach($rowdi as $y)
                        <option value="{{$y->id}}">
                            {{$y->name}}
                        </option>
                        @endforeach
                </select>
                @error('difficult')
                <div style="color: red;font-size: 13px">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">First Answer</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="First Answer" name="first"  value="{{old('first')}}">
                @error('first')
                <div style="color: red;font-size: 13px">Please Enter the answer</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="one" id="exampleRadios1" value="1">
                    <label class="form-check-label text-success" for="exampleRadios1">
                        Correct
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="one" id="exampleRadios2" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios2">
                        Wrong
                    </label>
                    @error('one')
                    <div style="color: red;font-size: 13px">Please Enter the Correctness</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">Second Answer</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Second Answer" name="second"  value="{{old('second')}}">
                @error('second')
                <div style="color: red;font-size: 13px;">Please Enter the answer</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="two" id="exampleRadios12" value="1">
                    <label class="form-check-label text-success" for="exampleRadios12">
                        Correct
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="two" id="exampleRadios22" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios22">
                        Wrong
                    </label>
                    @error('two')
                    <div style="color: red;font-size: 13px">Please Enter the Correctness</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">Third Answer</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Third Answer" name="third" value="{{old('third')}}">
                @error('third')
                <div style="color: red;font-size: 13px">Please Enter the answer</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="three" id="exampleRadios13" value="1">
                    <label class="form-check-label text-success" for="exampleRadios13">
                        Correct
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="three" id="exampleRadios23" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios23">
                        Wrong
                    </label>
                    @error('three')
                    <div style="color: red;font-size: 13px">Please Enter the Correctness</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">Fourth Answer</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Fourth Answer" name="fourth" value="{{old('fourth')}}">
                @error('fourth')
                <div style="color: red;font-size: 13px">Please Enter the answer</div>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="four" id="exampleRadios14" value="1">
                    <label class="form-check-label text-success" for="exampleRadios14">
                        Correct
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="four" id="exampleRadios24" value="0">
                    <label class="form-check-label text-danger" for="exampleRadios24">
                        Wrong
                    </label>
                    @error('four')
                    <div style="color: red;font-size: 13px">Please Enter the Correctness</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{{$chid}}/Questions">
            <button class="btn btn-secondary" type="button">
                Cancel
            </button>
        </a>
    </form>
@stop
