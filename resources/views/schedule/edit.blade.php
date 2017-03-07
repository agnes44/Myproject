@extends('layout.layout')

@section('contents')
<a href="{{ route('.schedule') }}" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h3>Edit Schedule</h3>
        <form class="form-horizontal" action="{{'/schedule/'.$item->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <input type="text" name ="title" placeholder="title" value ="{{$item->title}}"> <br \>
                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} <br \><br \>
                <input type="date" name ="start" placeholder="" value="{{$item->start}}">
                 {{ ($errors -> has('start')) ? $errors->first('start') : ' ' }} <br \><br \>
                <input type="date" name ="ends" placeholder="" value="{{$item->ends}}">
                 {{ ($errors -> has('ends')) ? $errors->first('ends') : ' ' }} <br \><br \>
                <textarea name="note" id="" cols="40" rows="8" placeholder="isi....">{{$item->note}}</textarea> <br \>
                {{ ($errors -> has('note')) ? $errors->first('note') : ' ' }} <br \><br \>
                
                <button type="submit" class ="btn btn-success">Submit</button>
                   
            </fieldset>
        </form>
</div>
@endsection