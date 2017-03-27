@extends('layouts.layouts')

@section('content')
<a href="/event" class ="btn btn-info col-lg-offset-3">Back</a><br><br>
<div class="col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" action="{{ route('adminevent.store') }}" method ="post">
        {{csrf_field()}}
            <fieldset>
                <input type="text" name ="title" value ="" placeholder="title" class="form-control">
                <br \><br \>
                <input type="date" name ="start" value ="" placeholder="date_start" class="form-control">
                <br \><br \>
                <input type="date" name ="end" value ="" placeholder="end_start" class="form-control">
                <br \><br \>
                <input type="text" name ="color" value="" placeholder="color" class="form-control">
                <br \><br \>

                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection