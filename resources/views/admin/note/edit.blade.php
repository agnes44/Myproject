@extends('layout.layout')

@section('contents')
<a href="/note" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h3>Edit Note</h3>
        <form class="form-horizontal" action="{{'/note/'.$note->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <textarea name="body" id="" cols="40" rows="8" placeholder="isi....">{{$note->body}}</textarea> <br \>
                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \>
                
                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection