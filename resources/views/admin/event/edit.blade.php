@extends('layouts.layouts')

@section('content')
<a href="/schedule" class ="btn btn-info col-lg-offset-3">Back</a><br><br>
<div class="col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" action="{{'/event/'.$event->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <input type="text" name ="title" placeholder="title" class="form-control" value="{{$event->title}}">
                <br \><br \>
                <input type="date" name ="start" placeholder="date_start" class="form-control" value="{{$event->start}}">
                <br \><br \>
                <input type="date" name ="end" placeholder="end_start" class="form-control" value="{{$event->end}}">
                <br \><br \>
                <div class="form-group">
                <div class="input-group demo2 colorpicker-element">
                <input type="text" name ="color" placeholder="color" class="form-control" value="{{$event->color}}">
                <span class ="input-group-addon"><i></i></span>
                 </div>
                 </div>
                <br \><br \>
                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection