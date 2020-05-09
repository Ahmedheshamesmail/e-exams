@extends('master3')
@section('content')
    <form style="margin-top: 13vh;font-size: 17px" action="insert-tf" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type Question here ..</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" cols="50" rows="3" name="text"></textarea>
            </div>
            @error('text')
            <div style="color: red;font-size: 13px">Please Enter your Question</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect02">Difficulty Degree</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="difficult">
                    @foreach($rowdi as $di)
                        <option value="{{$di->id}}">
                            {{$di->name}}
                        </option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">First Answer</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="First Answer" name="first">
                @error('first')
                <div style="color: red;font-size: 13px">Please Enter the Answer</div>
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
                    <div style="color: red;font-size: 13px">Please Enter Correctness</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationServer01">Second Answer</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Second Answer" name="second">
                @error('second')
                <div style="color: red;font-size: 13px">Please Enter the Answer</div>
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
                    <div style="color: red;font-size: 13px">Please Enter Correctness</div>
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
