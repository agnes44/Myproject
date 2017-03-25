@extends('layout.desain')

@section('kontent')
<a href="/todo" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h3>Edit List</h3>
        <form class="form-horizontal" action="{{'/todo/'.$todo->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <textarea name="body" id="" cols="40" rows="8" placeholder="isi....">{{$todo->body}}</textarea> <br \>
                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \>
                
                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection