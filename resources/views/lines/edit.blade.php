@extends('layout.layout')

@section('contents')
<a href="/lines" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h3>Edit</h3>
        <form class="form-horizontal" action="{{'/lines/'.$lines->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <input type="text" name ="title" placeholder="title" value ="{{$lines->title}}"> <br \>
                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} <br \><br \>

                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection