@extends('layouts.layouts')

@section('content')
<a href="/event" class ="btn btn-info col-lg-offset-3">Back</a><br><br>
<div class="col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" action="/event" method ="post">
        {{csrf_field()}}
            <fieldset>
                <input type="text" name ="title" value ="" placeholder="title" class="form-control">
                <br \>
                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} 
                <input type="date" name ="start" value ="" placeholder="date_start" class="form-control">
                <br \>
                {{ ($errors -> has('start')) ? $errors->first('start') : ' ' }} 
                <input type="date" name ="end" value ="" placeholder="end_start" class="form-control">
                <br \>
                {{ ($errors -> has('end')) ? $errors->first('end') : ' ' }} 
                <input type="text" name ="color" value="" placeholder="color" class="form-control">
                <br \>
                {{ ($errors -> has('color')) ? $errors->first('color') : ' ' }} 

                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection