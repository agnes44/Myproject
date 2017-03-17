@extends('layout.layout')

@section('contents')
<a href="/outlines" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" action="/outlines" method ="post">
        {{csrf_field()}}
            <fieldset>
                <textarea name="body" id="" cols="40" rows="8" placeholder="isi...."></textarea> <br \>
                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \>
               
                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection