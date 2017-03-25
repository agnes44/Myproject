@extends('layouts.layouts')

@section('content')
<a href="/note/addItem" class ="btn btn-info">Back</a>
<div class="col-lg-4">
        <form class="form-horizontal" action="/note" method ="post">
        {{csrf_field()}}
            <fieldset>
                <input type="text" name ="title" placeholder="title" > <br \>
                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} <br \><br \>
                <textarea name="body" id="" cols="110" rows="15" placeholder="isi...."></textarea> <br \>
                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \>
               
                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection