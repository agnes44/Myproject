@extends('layout.layout')

@section('contents')
<a href="/task" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h3>Edit Outlines</h3>
        <form class="form-horizontal" action="{{'/task/'.$item->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <input type="text" name ="title" placeholder="title" value ="{{$item->title}}"> <br \>
                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} <br \><br \>

                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection