@extends('master3')
@section('content')
    <form style="margin-top: 13vh;font-size: 17px" action="insert-open" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type Question here ..</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="50" name="text"></textarea>
            </div>
            @error('text')
            <div style="color: red;font-size: 13px">Please Enter your Question</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect02">Difficulty Degree</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="difficult">
                    @foreach($rowdi as $y)
                        <option value="{{$y->id}}">
                            {{$y->name}}
                        </option>
                        @endforeach
                </select>
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
