@extends('layouts.layouts')

@section('content')
<div class="col-lg-4 ">
        <form class="form-horizontal" action="{{ route('admintodo.store') }}" method ="post">
        {{csrf_field()}}
             <input type="text" class ="form-control" id ="body" name ="body" placeholder="Your body here" required="required">
                 {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \> 
             <button class ="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</button> 
        </form>
</div>
@endsection