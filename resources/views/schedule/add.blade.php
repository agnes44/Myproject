@extends('layout.layout')

@section('contents')
<a href="/schedule" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" action="/schedule" method ="post">
        {{csrf_field()}}
            <fieldset>
                <input type="text" name ="title" value ="" placeholder="title">
                <br \><br \>
                <input type="date" name ="start" value ='"' >
                <br \><br \>
                <input type="date" name ="ends" value ='"' >
                <br \><br \>
                <textarea name="note" cols="30" rows="10"></textarea>
                <br \><br \>
                        <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection